@extends('layouts.app')
@section('title', 'Puja & Jyotish Services in Ujjain | Raghav')
@section('meta')
<meta name="description" content="Discover puja services in Ujjain, from Vedic puja and Graha Shanti Puja to muhurat guidance and personal Jyotish consultation.">
<link rel="canonical" href="https://raghavjyotishujjain.online/services">
<meta property="og:type" content="website">
<meta property="og:url" content="https://raghavjyotishujjain.online/services">
<meta property="og:title" content="Puja &amp; Jyotish Services in Ujjain | Raghav">
<meta property="og:description" content="Discover Vedic puja, Graha Shanti, muhurat guidance and Jyotish consultation services in Ujjain.">
@endsection
@section('content')
<style>
    .services-page { max-width: 1120px; margin: 0 auto; padding: 42px 24px 64px; }
    .services-page h1 { margin-bottom: 10px; }
    .service-grid-page { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px; margin-top: 30px; }
    .service-tile-page { min-height: 180px; display: flex; align-items: end; padding: 20px; background: linear-gradient(180deg, #ffc45c, #7e5018); color: #fff; font: 1.25rem Georgia, serif; text-decoration: none; }
    .service-tile-page:hover { background: linear-gradient(180deg, #ffd27d, #934f12); }
    .service-info { display: none; margin-top: 32px; padding: 26px; border: 1px solid #d8e5f0; background: #f8fcff; } .service-info.is-visible { display: block; } .service-info h2 { color: #0a4275; } .service-info p { color: #58616a; } .service-info .service-rate { color: #d95405; font-size: 1.55rem; font-weight: 800; } .service-info a { display: inline-flex; padding: 11px 16px; background: #25d366; color: #fff; font-weight: 700; text-decoration: none; }
    @media (max-width: 700px) { .services-page { padding: 28px 16px 48px; } .service-grid-page { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; } .service-tile-page { min-height: 145px; padding: 14px; font-size: 1rem; } }
    @media (max-width: 420px) { .service-grid-page { grid-template-columns: 1fr; } }
</style>
<div class="services-page">
    <p class="muted">WHAT WE OFFER</p>
    <h1>Puja &amp; Jyotish Services in Ujjain ( हमारी सेवाएं )</h1>
    <p class="muted">Traditional puja arrangements and thoughtful Vedic guidance for every important milestone.</p>
    <div class="service-grid-page">
        @foreach(['Vedic Puja & Anushthan'=>'vedic-puja','Muhurat & Shubh Muhurat Guidance'=>'muhurat-guidance','Kundli & Jyotish Consultation'=>'kundli-consultation','Graha Shanti Puja'=>'graha-shanti','Griha Pravesh Puja'=>'griha-pravesh','Marriage & Vivah Puja'=>'vivah-puja','Online Jyotish Consultation'=>'online-consultation'] as $service=>$target)
            <a class="service-tile-page" href="#service-info" data-service-target="{{ $target }}">{{ $service }}</a>
        @endforeach
    </div>
    <section id="service-info" class="service-info" aria-live="polite">
        @foreach([['vedic-puja','Vedic Puja & Anushthan','विशेष अवसरों और पारिवारिक शांति के लिए संपूर्ण वैदिक पूजा एवं अनुष्ठान।','₹5,100 से शुरू'],['muhurat-guidance','Muhurat & Shubh Muhurat Guidance','विवाह, गृह प्रवेश, व्यापार और नए कार्य के लिए शुभ समय का मार्गदर्शन।','₹1,100'],['kundli-consultation','Kundli & Jyotish Consultation','जन्म कुंडली का विश्लेषण और जीवन के महत्वपूर्ण विषयों पर व्यक्तिगत सलाह।','₹1,500'],['graha-shanti','Graha Shanti Puja','ग्रहों के अशुभ प्रभाव को कम करने के लिए वैदिक मंत्रों के साथ शांति पूजा।','₹3,100 से शुरू'],['griha-pravesh','Griha Pravesh Puja','नए घर में सुख, शांति और समृद्धि के लिए पूर्ण गृह प्रवेश पूजा।','₹5,100 से शुरू'],['vivah-puja','Marriage & Vivah Puja','वैवाहिक जीवन के मंगल आरंभ और परिवार की खुशहाली के लिए विवाह संस्कार।','₹7,100 से शुरू'],['online-consultation','Online Jyotish Consultation','वीडियो या फोन कॉल के माध्यम से सुविधाजनक व्यक्तिगत ज्योतिष परामर्श।','₹1,100']] as [$id,$name,$description,$rate])
            <article id="{{ $id }}" class="service-info-card" hidden><h2>{{ $name }}</h2><p>{{ $description }}</p><p class="service-rate">{{ $rate }}</p><a href="https://wa.me/917974639689" target="_blank" rel="noopener">WhatsApp पर पूछें</a></article>
        @endforeach
    </section>
</div>
<script>document.querySelectorAll('[data-service-target]').forEach(function(link){link.addEventListener('click',function(){var section=document.getElementById('service-info');var selected=document.getElementById(link.dataset.serviceTarget);section.classList.add('is-visible');section.querySelectorAll('.service-info-card').forEach(function(card){card.hidden=card!==selected;});});});</script>
@endsection
