<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedEvents();
        $this->seedBlogPosts();
    }

    private function seedEvents(): void
    {
        $events = [
            [
                'title' => 'Hope Kitchen Community Meal — Jabi',
                'slug' => 'hope-kitchen-jabi-jun-2025',
                'excerpt' => 'Our weekly Saturday community meal at Jabi settlement. All welcome — volunteers and guests alike.',
                'description' => 'Every Saturday at 12pm, our Hope Kitchen team serves a hot meal to over 200 community members in Jabi settlement. Volunteers arrive at 9am to begin cooking. Come serve, come eat, come pray.',
                'start_date' => now()->addDays(4)->setTime(12, 0),
                'end_date' => now()->addDays(4)->setTime(14, 0),
                'location' => 'Jabi Settlement, Abuja',
                'venue_address' => 'Hope Kitchen Site 1, Jabi District, Abuja',
                'category' => 'Community',
                'is_free' => true,
                'image' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'title' => 'Bright Futures August Holiday Camp',
                'slug' => 'bright-futures-camp-aug-2025',
                'excerpt' => 'A week-long residential camp for 80 youth aged 10–18. Sports, arts, faith, friendship, and a break from tough neighborhoods.',
                'description' => 'Our flagship holiday camp. 80 youth, 24 volunteer leaders, 7 days of activities including sports, arts, life skills workshops, faith formation, and friendship-building. Cost fully sponsored for all participants.',
                'start_date' => now()->addDays(45)->setTime(9, 0),
                'end_date' => now()->addDays(52)->setTime(16, 0),
                'location' => 'Hilltop Camp, Jos Plateau',
                'venue_address' => 'Hilltop Christian Camp, Rayfield, Jos, Plateau State',
                'category' => 'Camp',
                'is_free' => true,
                'capacity' => 80,
                'registered' => 64,
                'image' => 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'title' => 'Healing Hands Mobile Clinic — Niger State',
                'slug' => 'mobile-clinic-niger-state-jul-2025',
                'excerpt' => 'Our monthly mobile clinic visits a rural community in Niger State. Volunteer doctors, nurses, and pharmacists welcome.',
                'description' => 'Once a month, our mobile clinic team travels to a rural community in Niger State, setting up a temporary clinic for the day. We see 80–120 patients, provide free medications, and refer complex cases to partner hospitals.',
                'start_date' => now()->addDays(14)->setTime(8, 0),
                'end_date' => now()->addDays(14)->setTime(18, 0),
                'location' => 'Lapai, Niger State',
                'venue_address' => 'Lapai Primary Health Centre, Lapai LGA, Niger State',
                'category' => 'Volunteer',
                'is_free' => true,
                'image' => 'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'title' => 'CHJ Foundation Annual Fundraising Gala',
                'slug' => 'annual-gala-2025',
                'excerpt' => 'Our annual fundraiser — an evening of stories, music, and partnership. Tables and individual tickets available.',
                'description' => 'Join us for our annual gala dinner. Hear stories from program beneficiaries, meet our staff and partners, and partner with us financially for the year ahead. Black-tie optional, generosity required.',
                'start_date' => now()->addDays(75)->setTime(18, 30),
                'end_date' => now()->addDays(75)->setTime(22, 0),
                'location' => 'Transcorp Hilton, Abuja',
                'venue_address' => 'Transcorp Hilton Hotel, 1 Aguiyi Ironsi Street, Maitama, Abuja',
                'category' => 'Fundraiser',
                'is_free' => false,
                'price' => 50000,
                'capacity' => 300,
                'registered' => 187,
                'image' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'title' => 'Monthly Prayer Gathering',
                'slug' => 'prayer-gathering-jul-2025',
                'excerpt' => 'First Saturday of every month. Join us to pray for the work, the people we serve, and the requests submitted through our prayer line.',
                'description' => 'A quiet, contemplative evening of prayer. We pray over every prayer request submitted during the month, by name where possible. All are welcome — come for 15 minutes or the full 90.',
                'start_date' => now()->addDays(7)->setTime(17, 0),
                'end_date' => now()->addDays(7)->setTime(18, 30),
                'location' => 'CHJ Foundation HQ, Wuse 2',
                'venue_address' => 'Plot 12, Peace Avenue, Jabi District, Abuja',
                'category' => 'Prayer',
                'is_free' => true,
                'image' => 'https://images.unsplash.com/photo-1572455024455-8a3d0c4f1e62?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'title' => 'Pathways Vocational Training — Cohort 12 Graduation',
                'slug' => 'pathways-cohort-12-graduation',
                'excerpt' => 'Celebrating the graduation of our 12th vocational training cohort. Tailoring, catering, IT, hairdressing, plumbing, solar.',
                'description' => 'Join us as we celebrate 24 graduates of our 12th Pathways cohort. Each graduate has completed 6 months of intensive vocational training and a 3-month internship. Ceremony followed by refreshments.',
                'start_date' => now()->addDays(28)->setTime(11, 0),
                'end_date' => now()->addDays(28)->setTime(14, 0),
                'location' => 'Pathways Training Centre, Wuse 2',
                'venue_address' => 'CHJ Foundation Pathways Centre, 23 Ademola Adetokunbo Crescent, Wuse 2, Abuja',
                'category' => 'Community',
                'is_free' => true,
                'image' => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
            ],
        ];

        foreach ($events as $event) {
            Event::create(array_merge($event, ['is_published' => true]));
        }
    }

    private function seedBlogPosts(): void
    {
        $posts = [
            [
                'title' => 'Amina\'s story: from a wall in Gwarinpa to a kitchen of her own',
                'slug' => 'aminas-story',
                'excerpt' => 'Two years ago, Amina was watching her children line up for a meal. Today, she serves the meals — and her children are back in school.',
                'body' => '<p>The afternoon sun was relentless the day we met Amina. She was sitting on a low wall outside the Hope Kitchen in Gwarinpa, watching her three children line up with plastic bowls for the Saturday meal.</p><p>Her husband had died six months earlier — a sudden illness, no diagnosis, no insurance. The rent was overdue. The children were not in school. The bowl of rice and stew she was about to receive would be their only meal that day.</p><p>That was two years ago. Today, Amina works in the Hope Kitchen. She cooks the rice, hands out the bowls, knows every child by name. Her children are back in school, on CHJ Foundation scholarships. She still attends the Saturday meal — but now as a server, not a recipient.</p><h2>What changed</h2><p>When we met Amina, our team did not have a program for her. We had Hope Kitchen for food. We had Pathways for education. We had Bright Futures for mentorship. But we did not have a coordinated way to walk with a widow from crisis to stability.</p><p>So we created one. Amina was the first participant in what we now call our Family Resilience Program — a six-month wraparound support that includes food, school fees for children, vocational assessment, trauma counseling, and a clear path to employment.</p><blockquote>"They did not just give me food," Amina says. "They gave me back my dignity. Today I work in their kitchen, serving other mothers. I am not who I was two years ago."</blockquote><h2>The bigger picture</h2><p>Amina\'s story is one of dozens. Since 2023, 47 families have completed the Family Resilience Program. 89% are now economically self-sufficient. 100% have their children back in school.</p><p>Numbers tell part of the story. Amina tells the rest.</p><p>If you would like to support this work — whether through giving, volunteering, or partnership — we would love to hear from you. The next Amina is sitting on a wall somewhere right now, watching her children line up for a meal.</p><p>Will you help us find her?</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1531123897727-8f129e1688ce?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'author' => 'Aisha Bello',
                'author_bio' => 'Director of Programs, CHJ Foundation',
                'category' => 'Stories',
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => '5 lessons from 5 years of Hope Kitchen',
                'slug' => 'five-lessons-hope-kitchen',
                'excerpt' => 'As we mark 5 years of our food security program, here are five things we have learned about feeding communities with dignity.',
                'body' => '<p>Five years ago this month, we cooked our first pot of rice in Wuse 2. Forty children came that Saturday. Last Saturday, we served 1,847 meals across three sites.</p><p>Here are five things five years have taught us.</p><h2>1. Consistency is more important than scale</h2><p>In our first year, we tried to expand to five sites. We burnt out our volunteers and the quality dropped. We scaled back to two, then three, and stayed there. The lesson: a community would rather have a reliable weekly meal than an unreliable daily one.</p><h2>2. Dignity is in the details</h2><p>We serve meals on ceramic plates, not paper. We seat families at tables, not in lines. We use real cutlery. These small choices cost more — but they communicate something profound: <em>you are worth the effort.</em></p><h2>3. Listen to the people you serve</h2><p>Our menu changes based on what families tell us they want. We added more vegetables when mothers requested them. We added a vegetarian option when some families observed meatless fasts. We did not assume — we asked.</p><h2>4. The meal is the doorway, not the destination</h2><p>Hope Kitchen is how most families first meet us. But the real work happens after the meal — when our staff sit with a mother and ask about her children\'s school fees. When we connect a father with our Pathways program. When we refer a grandmother to Healing Hands. Food opens the door. Relationship walks through it.</p><h2>5. Volunteers become family</h2><p>Three of our current full-time staff started as Saturday volunteers. Many of our volunteers have been with us for 3+ years. They do not just serve food — they weep with families, pray with parents, celebrate graduations. The volunteer team is not a workforce. It is a community.</p><p>Five years. 148,000 meals. And we are just getting started.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'author' => 'Fr. Daniel Okonkwo',
                'author_bio' => 'Founder & Executive Director, CHJ Foundation',
                'category' => 'Reflections',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Safe Harbor coordinates rescue of 9 young women',
                'slug' => 'safe-harbor-rescue-sept-2024',
                'excerpt' => 'In September 2024, our Safe Harbor team coordinated with NAPTIP to rescue 9 young women from a trafficking ring operating between Lagos and Cotonou.',
                'body' => '<p>On a Tuesday afternoon in September, our 24/7 rescue line received a call from a young woman whispering that she and eight others were being held in a house in Lagos, awaiting transport to Cotonou.</p><p>Within 12 hours, working with NAPTIP and the Nigeria Police Force, all 9 young women were safely extracted. Three alleged traffickers were arrested.</p><p>All 9 survivors were brought to our Safe Harbor facility in Abuja. Three are now in counseling. Four have begun Pathways vocational training. Two chose to return to their families in southeast Nigeria, with our family reunification support.</p><p>This is what Safe Harbor was built for. This is what your support makes possible.</p><p>If you or someone you know is in danger of trafficking, call NAPTIP at 0703 000 2030 or our Safe Harbor line at +234 809 876 5432. 24 hours a day. 7 days a week.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'author' => 'Emmanuel Tola',
                'author_bio' => 'Safe Harbor Program Lead',
                'category' => 'News',
                'published_at' => now()->subDays(28),
            ],
            [
                'title' => 'Healing Hands launches maternal care program',
                'slug' => 'maternal-care-program-launch',
                'excerpt' => 'In partnership with Wuse General Hospital, we now offer full antenatal, delivery, and postnatal care — 100% free of charge.',
                'body' => '<p>Nigeria has one of the highest maternal mortality rates in the world. In the communities we serve, many women give birth without ever seeing a midwife.</p><p>That is why, in June 2024, Healing Hands launched a maternal care program in partnership with Wuse General Hospital. The program provides full antenatal care, hospital delivery, and postnatal support — 100% free of charge — for 180 women each year.</p><p>In our first six months, we have served 87 mothers. Zero maternal deaths. Zero infant deaths. Every mother and baby went home healthy.</p><p>This is what compassionate healthcare looks like.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'author' => 'Dr. Ngozi Eze',
                'author_bio' => 'Healing Hands Medical Lead',
                'category' => 'News',
                'published_at' => now()->subDays(45),
            ],
            [
                'title' => 'Volunteer spotlight: David, three years as a Bright Futures mentor',
                'slug' => 'volunteer-spotlight-david',
                'excerpt' => 'David started mentoring with Bright Futures in 2022. Three years later, he says it has changed him more than the youth he mentors.',
                'body' => '<p>David is a 34-year-old accountant who started mentoring with Bright Futures in 2022. He was matched with Samuel, then 14, who had lost his father and was struggling in school.</p><p>"I did not know what I was doing," David admits. "I just showed up every Tuesday after work. We would talk about football, then homework, then life. After a year, Samuel started opening up. After two years, he was making friends. After three years, he wants to be a mentor himself."</p><p>David is one of 180 active mentors in Bright Futures. Most are working professionals. All commit to a minimum of one year of weekly meetings with their mentee.</p><p>"The truth is, mentoring has changed me more than it changed Samuel," David says. "I am more patient. I am more present. I am a better father to my own kids. I think that is how compassion works — it transforms the giver as much as the receiver."</p><p>We are always looking for new mentors. If you can commit to one year of weekly meetings with a young person, we would love to talk. <a href="' . route('get-involved.volunteer') . '">Apply to volunteer</a>.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'author' => 'CHJ Team',
                'author_bio' => 'Staff writer, CHJ Foundation',
                'category' => 'Volunteers',
                'published_at' => now()->subDays(60),
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create(array_merge($post, ['is_published' => true]));
        }
    }
}
