@extends('layouts.app')
@section('title', 'Mahakal Darshan | Raghav')
@section('content')
<style>
    .mahakal-page { max-width: 1120px; margin: 0 auto; padding: 42px 24px 64px; }
    .mahakal-hero { position: relative; min-height: 500px; display: flex; align-items: end; overflow: hidden; background: #21120c url('{{ asset('images/mahakal-darshan.jpg') }}') center/cover no-repeat; }
    .mahakal-hero::after { content: ''; position: absolute; inset: 0; background: linear-gradient(transparent 35%, rgba(20, 8, 3, .82)); }
    .mahakal-copy { position: relative; z-index: 1; max-width: 620px; padding: 36px; color: #fff; }
    .mahakal-copy h1 { margin-bottom: 10px; font: 2.7rem Georgia, serif; }
    .mahakal-copy p { margin-bottom: 0; font-size: 1.05rem; }
    .mahakal-details { display: grid; grid-template-columns: 1.2fr .8fr; gap: 24px; margin-top: 24px; }
    @media (max-width: 700px) { .mahakal-page { padding: 28px 16px 48px; } .mahakal-hero { min-height: 420px; } .mahakal-copy { padding: 24px; } .mahakal-copy h1 { font-size: 2.1rem; } .mahakal-details { grid-template-columns: 1fr; } }
</style>
<div class="mahakal-page">
    <div class="mahakal-hero">
        <div class="mahakal-copy">
            <p class="muted" style="color:#ffd9a0">DIVINE DARSHAN</p>
            <h1>Mahakal Darshan</h1>
            <p>Seek the blessings of Mahakal, the timeless form of Lord Shiva, with devotion and a peaceful heart.</p>
        </div>
    </div>
    <div class="mahakal-details">
        <article class="card">
            <h2>Jai Mahakal</h2>
            <p>Mahakal Darshan is a sacred opportunity to connect with the presence of Lord Shiva and offer your prayers with faith.</p>
            <p>May Mahakal bless your family with courage, peace and protection.</p>
        </article>
        <aside class="card">
            <h2>Plan your visit</h2>
            <p class="muted">For darshan guidance, puja arrangements or a personalised consultation, speak with our team.</p>
            <a class="button secondary" href="{{ route('contact') }}">Contact us</a>
        </aside>
    </div>
</div>
@endsection
