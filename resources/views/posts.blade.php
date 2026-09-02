@extends('layouts.app')
@section('title', 'Vedic Posts | Raghav')
@section('content')
<style>
    .posts-page { max-width: 1120px; margin: 0 auto; padding: 42px 24px 64px; }
    .posts-page h1 { margin-bottom: 28px; }
    .posts-layout { display: grid; grid-template-columns: minmax(0, 3fr) minmax(220px, 1fr); gap: 28px; }
    .posts-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px; }
    .post-card { overflow: hidden; border: 1px solid #e6e6e6; background: #fff; }
    .post-image { height: 150px; background: #6b3d16 url('{{ asset('images/puja-gallery.png') }}') center/cover no-repeat; }
    .post-card:nth-child(2) .post-image { background-position: 30% center; }
    .post-card:nth-child(3) .post-image { background-position: 64% center; }
    .post-card:nth-child(4) .post-image { background-position: 90% center; }
    .post-copy { padding: 16px; }
    .post-copy a, .top-articles a { color: #db5908; font-family: Georgia, serif; font-size: 1.05rem; }
    .post-copy p { margin: 10px 0 0; color: #6a6f75; font-size: .84rem; }
    .top-articles h2 { margin-top: 0; }
    .top-articles a { display: block; margin-bottom: 13px; font-family: Arial, sans-serif; font-size: .9rem; }
    @media (max-width: 700px) { .posts-page { padding: 28px 16px 48px; } .posts-layout { grid-template-columns: 1fr; } .posts-grid { grid-template-columns: 1fr; } }
</style>
<div class="posts-page">
    <p class="muted">VEDIC WISDOM</p>
    <h1>Vedic Posts ( वैदिक लेख )</h1>
    <div class="posts-layout">
        <div class="posts-grid">
            @foreach([['muhurat','नई शुरुआत के लिए शुभ मुहूर्त','January 11, 2026','शुभ कार्य के लिए मुहूर्त क्यों जरूरी है और सही समय कैसे चुनें।'],['navgraha','नवग्रहों के स्वरूप और उनका फल','March 15, 2024','नवग्रहों का जीवन पर प्रभाव और उनसे जुड़ी सरल जानकारी।'],['vastu','वास्तु के सरल उपाय','July 21, 2024','घर में सकारात्मक ऊर्जा और शांति बनाए रखने के उपयोगी उपाय।'],['family-puja','परिवार की पूजा की तैयारी','July 1, 2024','पूजा से पहले आवश्यक सामग्री, संकल्प और तैयारी की जानकारी।']] as [$slug, $title, $date, $description])
                <article class="post-card">
                    <div class="post-image"></div>
                    <div class="post-copy">
                        <a href="{{ route('astrology', ['guidance' => $slug]) }}">{{ $title }}</a>
                        <p>{{ $description }}</p>
                    </div>
                </article>
            @endforeach
        </div>
        <aside class="top-articles">
            <h2>Top Articles</h2>
            <a href="{{ route('astrology', ['guidance' => 'muhurat']) }}">नई शुरुआत के लिए शुभ मुहूर्त</a>
            <a href="{{ route('astrology', ['guidance' => 'navgraha']) }}">नवग्रहों का स्वरूप और उनका फल</a>
            <a href="{{ route('astrology', ['guidance' => 'vastu']) }}">वास्तु के सरल उपाय</a>
            <a href="{{ route('astrology', ['guidance' => 'family-puja']) }}">परिवार की पूजा की तैयारी</a>
        </aside>
    </div>
</div>
@endsection
