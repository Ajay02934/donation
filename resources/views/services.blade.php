@extends('layouts.app')
@section('title', 'Our Services | Ragav Jyoti')
@section('content')
<style>
    .services-page { max-width: 1120px; margin: 0 auto; padding: 42px 24px 64px; }
    .services-page h1 { margin-bottom: 10px; }
    .service-grid-page { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px; margin-top: 30px; }
    .service-tile-page { min-height: 180px; display: flex; align-items: end; padding: 20px; background: linear-gradient(180deg, #ffc45c, #7e5018); color: #fff; font: 1.25rem Georgia, serif; text-decoration: none; }
    .service-tile-page:hover { background: linear-gradient(180deg, #ffd27d, #934f12); }
    @media (max-width: 700px) { .services-page { padding: 28px 16px 48px; } .service-grid-page { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; } .service-tile-page { min-height: 145px; padding: 14px; font-size: 1rem; } }
    @media (max-width: 420px) { .service-grid-page { grid-template-columns: 1fr; } }
</style>
<div class="services-page">
    <p class="muted">WHAT WE OFFER</p>
    <h1>Our Services ( हमारी सेवाएं )</h1>
    <p class="muted">Traditional puja arrangements and thoughtful Vedic guidance for every important milestone.</p>
    <div class="service-grid-page">
        <a class="service-tile-page" href="{{ route('pujas.index') }}">Vedic Puja &amp; Anushthan</a>
        <a class="service-tile-page" href="{{ route('astrology', ['guidance' => 'muhurat']) }}">Muhurat &amp; Shubh Muhurat Guidance</a>
        <a class="service-tile-page" href="{{ route('astrology', ['guidance' => 'muhurat']) }}">Kundli &amp; Jyotish Consultation</a>
        <a class="service-tile-page" href="{{ route('pujas.index', ['search' => 'Navgraha']) }}">Graha Shanti Puja</a>
        <a class="service-tile-page" href="{{ route('pujas.index', ['search' => 'Griha']) }}">Griha Pravesh Puja</a>
        <a class="service-tile-page" href="{{ route('pujas.index', ['search' => 'Marriage']) }}">Marriage &amp; Vivah Puja</a>
        <a class="service-tile-page" href="{{ route('astrology') }}">Online Jyotish Consultation</a>
    </div>
</div>
@endsection
