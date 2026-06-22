@extends('layouts.app', [
    'title' => 'Stories & News',
    'description' => 'Stories of hope, healing, and impact from CHJ Foundation programs across Nigeria.',
])

@section('content')

<x-ui.page-hero
    eyebrow="Stories & News"
    title="Dispatches from the work."
    intro="Real stories from the people we serve, the volunteers who serve them, and the staff who walk alongside. Plus news, updates, and reflections on faith in action."
/>

<x-ui.section bg="white" spacing="default">
    <div class="container-prose">

        {{-- Category filter (visual only — wire up to controller later) --}}
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-stone-200 pb-6">
            <div class="flex flex-wrap gap-2">
                @foreach (['All', 'Stories', 'News', 'Reflections', 'Programs', 'Volunteers'] as $i => $cat)
                    <a href="?category={{ strtolower($cat) }}"
                       class="rounded-full px-3 py-1.5 text-xs font-semibold uppercase tracking-widest transition-colors
                       @if (request('category', 'all') === strtolower($cat) || ($i === 0 && !request('category')))
                           bg-brand-600 text-white shadow-soft
                       @else
                           bg-stone-100 text-stone-700 hover:bg-brand-100 hover:text-brand-700
                       @endif">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>
            <p class="text-xs text-stone-500">{{ $posts->total() ?? count($posts) }} stories</p>
        </div>

        {{-- Featured post --}}
        @if (isset($posts[0]))
            @php $featured = $posts[0]; @endphp
            <article class="mt-10 grid gap-8 lg:grid-cols-2 lg:gap-12 items-center">
                <a href="{{ route('blog.show', $featured) }}" class="group block overflow-hidden rounded-2xl shadow-lifted">
                    <div class="aspect-[16/9] overflow-hidden">
                        <img src="{{ $featured->featured_image ?? 'https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80' }}"
                             alt="{{ $featured->title }}"
                             class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                             loading="lazy"/>
                    </div>
                </a>
                <div>
                    <span class="inline-flex items-center gap-2 rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-brand-700 ring-1 ring-inset ring-brand-200">
                        <span class="h-1.5 w-1.5 rounded-full bg-spark-400"></span>
                        Featured · {{ $featured->category ?? 'Story' }}
                    </span>
                    <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight text-stone-900 sm:text-4xl">
                        <a href="{{ route('blog.show', $featured) }}" class="hover:text-brand-700">{{ $featured->title }}</a>
                    </h2>
                    <p class="mt-4 text-base leading-relaxed text-stone-600">{{ $featured->excerpt }}</p>
                    <div class="mt-5 flex items-center gap-3 text-sm">
                        <span class="font-medium text-stone-800">{{ $featured->author ?? 'CHJ Team' }}</span>
                        <span class="text-stone-400">·</span>
                        <span class="text-stone-500">{{ isset($featured->published_at) ? $featured->published_at->format('j F Y') : date('j F Y') }}</span>
                        <span class="text-stone-400">·</span>
                        <span class="text-stone-500">{{ $featured->reading_time ?? 4 }} min read</span>
                    </div>
                    <div class="mt-6">
                        <x-ui.button variant="outline" href="{{ route('blog.show', $featured) }}">Read story</x-ui.button>
                    </div>
                </div>
            </article>
        @endif

        {{-- Post grid --}}
        @if (count($posts) > 1)
            <div class="mt-16 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @php $gridPosts = array_slice($posts->items() ?? $posts, 1); @endphp
                @foreach ($gridPosts as $i => $post)
                    <article
                        x-data="reveal({{ $i * 60 }})"
                        x-intersect.once="onIntersect()"
                        class="fade-up flex flex-col"
                    >
                        <a href="{{ route('blog.show', $post) }}" class="group block overflow-hidden rounded-2xl shadow-card ring-1 ring-stone-200/60 transition-all hover:shadow-lifted">
                            <div class="aspect-[3/2] overflow-hidden">
                                <img src="{{ $post->featured_image ?? 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80' }}"
                                     alt="{{ $post->title }}"
                                     class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                     loading="lazy"/>
                            </div>
                            <div class="flex flex-1 flex-col p-6">
                                <span class="text-[10px] font-semibold uppercase tracking-widest text-brand-700">{{ $post->category ?? 'Story' }}</span>
                                <h3 class="mt-2 font-display text-lg font-semibold text-stone-900 group-hover:text-brand-700">{{ $post->title }}</h3>
                                <p class="mt-2 flex-1 text-sm leading-relaxed text-stone-600">{{ $post->excerpt }}</p>
                                <div class="mt-4 flex items-center justify-between text-xs text-stone-500 border-t border-stone-100 pt-4">
                                    <span>{{ isset($post->published_at) ? $post->published_at->format('j M Y') : date('j M Y') }}</span>
                                    <span>{{ $post->reading_time ?? 4 }} min read</span>
                                </div>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        @endif

        {{-- Pagination --}}
        @if (method_exists($posts, 'links'))
            <div class="mt-12">{{ $posts->withQueryString()->links() }}</div>
        @endif
    </div>
</x-ui.section>

@endsection
