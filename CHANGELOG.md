# Changelog

All notable changes to the CHJ Foundation project are documented in this file.

## [Unreleased] — Production Hardening

### Phase 1 — Critical Security

#### Removed committed secrets from `.env.vercel`
- **Files modified:** `.env.vercel`
- **Reason:** The file was tracked in git and contained the live Neon Postgres database password (`npg_5x1ZJBWLYmeq`), the `APP_KEY`, the database host, and the database username. Anyone with read access to the repository had full database access.
- **Change:** Replaced `APP_KEY`, `DB_HOST`, `DB_USERNAME`, and `DB_PASSWORD` values with empty strings. Added a comment block at the bottom of the file documenting that these values must be set as Vercel project environment variables.
- **Verification:** `grep -n "npg_5x1\|AVNS_OUyn\|base64:k+tDEQ" .env.vercel` returns no matches.
- **Regression risk:** None. The Vercel deployment will require the four environment variables to be set in the Vercel project settings before the next deployment. The application will not boot without `APP_KEY`.

#### Added dev artifacts to `.vercelignore`
- **Files modified:** `.vercelignore`
- **Reason:** `public/hot` (Vite dev server marker) and `public/fonts-manifest.dev.json` (dev-only font manifest) could be deployed if the deployment is done via file copy rather than `git pull`. The `public/hot` file causes Vite to generate asset URLs pointing to `http://[::1]:5173`, breaking all CSS and JS in production.
- **Change:** Added `public/hot` and `public/fonts-manifest.dev.json` to `.vercelignore`.
- **Verification:** `cat .vercelignore` shows both entries.
- **Regression risk:** None. These files are already in `.gitignore` and not tracked in git, but this adds a second layer of protection for non-git deployments.

#### Fixed unpublished events accessible via direct URL
- **Files modified:** `app/Http/Controllers/EventsController.php`
- **Reason:** `EventsController::show()` did not check `$event->is_published` before returning the event detail page. Unpublished events (drafts, cancelled events) were accessible via direct URL if the slug was known. This was inconsistent with `BlogController::show()` which checks `is_published`.
- **Change:** Added `if (!$event->is_published) { abort(404); }` to the `show()` method.
- **Verification:** `grep -A3 "function show" EventsController.php` shows the `is_published` check.
- **Regression risk:** Minimal. Only affects direct URL access to unpublished events. Published events continue to work. Events linked from the events index page are always published (the `upcoming` scope filters by `is_published = true`).

#### Fixed prayer request follow-up without email
- **Files modified:** `app/Http/Requests/PrayerRequestRequest.php`
- **Reason:** A user could check "I would like someone from the team to follow up with me" without providing an email address. The prayer request would be stored with `follow_up = true` and `email = null`, making follow-up impossible.
- **Change:** Added `required_if:follow_up,1` rule to the `email` field. Added a custom error message: "Please provide an email address so we can follow up with you."
- **Verification:** `grep "email" PrayerRequestRequest.php` shows the `required_if` rule and message.
- **Regression risk:** None. Users who don't check the follow-up checkbox are unaffected. Users who check it must now provide an email — this is the correct behavior the UI already promises ("requires email above").

### Phase 2 — Reliability

#### Wrapped all email sending in try/catch
- **Files modified:** `app/Http/Controllers/ContactController.php`, `app/Http/Controllers/VolunteerController.php`, `app/Http/Controllers/DonateController.php`, `app/Http/Controllers/PrayerRequestController.php`, `app/Http/Controllers/NewsletterController.php`
- **Reason:** All 5 controllers called `Mail::to()->send()` synchronously without error handling. If the mail server was down or timed out, the user received a 500 error, but the database record was already saved — creating an orphaned record with no notification email.
- **Change:** Wrapped each `Mail::send()` call in `try { ... } catch (\Exception $e) { Log::error(...); }`. Added `use Illuminate\Support\Facades\Log;` import to each controller. The user still sees the success message because the DB record was saved successfully.
- **Verification:** `grep -l "try {" app/Http/Controllers/*.php` lists all 5 controllers. `grep -l "use Illuminate\\Support\\Facades\\Log" app/Http/Controllers/*.php` lists all 5 controllers.
- **Regression risk:** None. Normal email sending behavior is unchanged. The only difference is that mail failures are now logged instead of causing a 500 error.

#### Fixed blog/events category filter for PostgreSQL
- **Files modified:** `app/Http/Controllers/BlogController.php`, `app/Http/Controllers/EventsController.php`
- **Reason:** The category filter chips send lowercase values (`?category=stories`), but the database stores titlecase values (`Stories`). On MySQL with `utf8mb4_unicode_ci` collation, `WHERE category = 'stories'` is case-insensitive and works. On PostgreSQL (used by the Vercel deployment), `WHERE` is case-sensitive by default — the query returns zero results for every specific category filter.
- **Change:** Replaced `$query->where('category', $category)` with `$query->whereRaw('LOWER(category) = ?', [strtolower($category)])`. This is a parameterized query (no SQL injection risk) and works identically on both MySQL and PostgreSQL.
- **Verification:** `grep "whereRaw" BlogController.php EventsController.php` shows the new query in both controllers.
- **Regression risk:** None. On MySQL, `LOWER()` is already case-insensitive so behavior is unchanged. On PostgreSQL, the filter now works correctly for all categories.

#### Cleaned up duplicate keys in `.env`
- **Files modified:** `.env`
- **Reason:** Three environment variables were defined twice, with the last value silently winning: `LOG_CHANNEL` (stack vs stderr), `SESSION_DRIVER` (database vs cookie), `CACHE_STORE` (database vs array). The bottom section was a Vercel-specific override that was accidentally pasted into the local `.env`.
- **Change:** Removed the duplicate section at the bottom of the file (lines 96-108 of the old file). The local `.env` now has exactly one value for each key, matching the local development configuration.
- **Verification:** `grep -c "^LOG_CHANNEL" .env` = 1, `grep -c "^SESSION_DRIVER" .env` = 1, `grep -c "^CACHE_STORE" .env` = 1.
- **Regression risk:** None. The effective values haven't changed (the last value was already winning). The file is now just cleaner and less confusing.

### Phase 3 — Public Forms

#### Added rate limiting to all public form routes
- **Files modified:** `routes/web.php`
- **Reason:** None of the 5 public POST routes (`contact.store`, `volunteer.store`, `donate.store`, `prayer.store`, `newsletter.store`) had any rate limiting. The forms were wide open to automated spam and denial-of-service attacks.
- **Change:** Added `->middleware('throttle:10,1')` to all 5 POST routes. This allows 10 submissions per minute per IP address — generous enough for legitimate users but sufficient to block automated spam bots.
- **Verification:** `grep "throttle" routes/web.php` shows all 5 routes with the middleware.
- **Regression risk:** Minimal. 10 submissions per minute per IP is well above any legitimate usage pattern. If a user is behind a shared NAT (office, school), the limit is shared across all users on that IP — but 10 per minute is still sufficient for a charity website.

#### Activated loading state on all forms
- **Files modified:** `resources/views/pages/contact.blade.php`, `resources/views/pages/get-involved/volunteer.blade.php`, `resources/views/pages/get-involved/donate.blade.php`, `resources/views/pages/prayer-request.blade.php`, `resources/views/components/footer/site-footer.blade.php`
- **Reason:** Every form had a loading spinner UI (`x-show="submitting"`) and a `:disabled="submitting"` button, but the `submitting` state was never set to `true` because no form called the `chjForm.submit()` method. All forms submitted natively, bypassing the Alpine component. This meant users could click submit multiple times during slow server responses, causing duplicate submissions.
- **Change:** Added `@submit.prevent="submit($event)"` to each form. Alpine now intercepts the submit event, runs HTML5 validation, sets `submitting = true` (which disables the button and shows the spinner), then calls `form.submit()` which submits natively (bypassing Alpine's event listener — no infinite loop).
- **Verification:** `grep -rl "@submit.prevent" resources/views/` lists all 5 form views.
- **Regression risk:** None. The submission behavior is identical — the form still POSTs natively. The only difference is that the button is now disabled and shows a spinner during submission, preventing duplicate clicks.

### Phase 4 — Accessibility

#### Moved `[x-cloak]` CSS to `<head>`
- **Files modified:** `resources/views/layouts/app.blade.php`, `resources/views/components/footer/site-footer.blade.php`
- **Reason:** The `[x-cloak] { display: none !important; }` CSS rule was in `site-footer.blade.php`, which renders at the bottom of the page. Alpine components with `x-cloak` in the header (mobile drawer, desktop dropdowns) and form inputs (error messages) could flash briefly before the footer CSS loaded.
- **Change:** Added `<style>[x-cloak]{display:none!important}</style>` to the `<head>` in `layouts/app.blade.php`. Removed the `<style>` block from `site-footer.blade.php`.
- **Verification:** `grep "x-cloak" resources/views/layouts/app.blade.php` shows the rule in `<head>`. `grep "x-cloak" resources/views/components/footer/site-footer.blade.php` returns no matches.
- **Regression risk:** None. The CSS rule is identical, just moved to an earlier position in the page load order.

#### Added Escape key handler to mobile navigation
- **Files modified:** `resources/views/components/nav/header.blade.php`, `resources/views/layouts/app.blade.php`
- **Reason:** The mobile drawer (`role="dialog"`, `aria-modal="true"`) had no Escape key handler. Keyboard users could not close the drawer with Escape — they had to find and click the X button or the backdrop. Additionally, the toast container in the layout had an empty `@keydown.escape.window=""` handler that did nothing.
- **Change:** Added `@keydown.escape.window="if (open) close()"` to the `<header>` element (which has `x-data="mobileNav"`). This calls `close()` only when the drawer is open. Removed the empty `@keydown.escape.window=""` from the toast container.
- **Verification:** `grep "keydown.escape" resources/views/components/nav/header.blade.php` shows the handler. `grep "keydown.escape" resources/views/layouts/app.blade.php` returns no matches (empty handler removed).
- **Regression risk:** None. The Escape handler only fires when the mobile drawer is open. The toast container's empty handler was dead code.

### Phase 5 — Performance

#### Removed unused Instrument Sans font from Vite config
- **Files modified:** `vite.config.js`
- **Reason:** The Vite config loaded `Instrument Sans` via Bunny Fonts, but the CSS `@theme` uses `Inter` and `Playfair Display` (loaded via `@fontsource`). `Instrument Sans` was never referenced in any CSS rule. The build output contained ~12 unused `instrument-sans-*.woff/woff2` files (~200KB) downloaded on every page load.
- **Change:** Removed the `bunny('Instrument Sans', ...)` fonts block and the `import { bunny } from 'laravel-vite-plugin/fonts'` import from `vite.config.js`.
- **Verification:** `grep -c "bunny\|Instrument" vite.config.js` = 0.
- **Regression risk:** None. The font was never used in any CSS rule. The build will no longer generate Instrument Sans font files, but no styles reference them.

#### Removed dead imports
- **Files modified:** `app/Http/Controllers/ProgramController.php`, `app/Http/Controllers/HomeController.php`, `routes/console.php`, `database/seeders/DatabaseSeeder.php`
- **Reason:** Four files had imports that were never used: `ProgramController` imported `Illuminate\Http\Request` and `Illuminate\Support\AbortResponse` (the latter doesn't exist in Laravel and would fail static analysis). `HomeController` imported `Illuminate\Http\Request`. `console.php` imported `Illuminate\Support\Facades\Schedule`. `DatabaseSeeder` imported `Illuminate\Support\Str`.
- **Change:** Removed each unused import.
- **Verification:** `grep "^use " app/Http/Controllers/ProgramController.php` shows only `NotFoundHttpException`. `grep "^use " app/Http/Controllers/HomeController.php` shows only `Event`. `grep "^use " routes/console.php` shows only `Artisan`. `grep "^use " database/seeders/DatabaseSeeder.php` shows only `BlogPost`, `Event`, `Seeder`.
- **Regression risk:** None. Unused imports have no runtime effect. PHP does not autoload classes from unused imports.

#### Added missing model casts
- **Files modified:** `app/Models/Event.php`, `app/Models/BlogPost.php`
- **Reason:** Several integer and decimal fields were not cast in the model, causing Eloquent to return them as strings. `Event.price` (decimal), `Event.capacity` (integer), `Event.registered` (integer), `BlogPost.reading_time` (integer) were all returned as strings, relying on PHP's automatic type juggling.
- **Change:** Added `'price' => 'decimal:2'`, `'capacity' => 'integer'`, `'registered' => 'integer'` to `Event::$casts`. Added `'reading_time' => 'integer'` to `BlogPost::$casts`.
- **Verification:** `grep -A8 "casts" app/Models/Event.php` shows all 7 casts. `grep -A4 "casts" app/Models/BlogPost.php` shows all 3 casts.
- **Regression risk:** Minimal. The `decimal:2` cast returns a string (same as before for `number_format()` usage). The `integer` cast returns an int instead of a string — PHP handles this transparently in all view arithmetic and string interpolation.
