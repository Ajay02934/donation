@extends('layouts.app')

@section('title', 'Vedic Puja Services in Ujjain | Raghav Puja Kendra')
@section('meta')
<meta name="description" content="Explore Vedic puja services in Ujjain, including Graha Shanti, Griha Pravesh and Vivah puja arrangements from Raghav Puja &amp; Jyotish Kendra.">
<link rel="canonical" href="https://raghavjyotishujjain.online/pujas">
<meta property="og:type" content="website">
<meta property="og:url" content="https://raghavjyotishujjain.online/pujas">
<meta property="og:title" content="Vedic Puja Services in Ujjain | Raghav Puja Kendra">
<meta property="og:description" content="Explore Vedic puja services in Ujjain, including Graha Shanti, Griha Pravesh and Vivah puja arrangements.">
@endsection

@section('content')
<style>
    .puja-page{max-width:1280px;margin:0 auto;padding:42px 24px}.puja-page-head{margin-bottom:24px}.puja-page-head h1{margin-bottom:8px;color:#0a4275}.puja-page-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px}.puja-page-card{display:flex;flex-direction:column;padding:24px;border:1px solid #f0d6b2;background:#fffaf2;box-shadow:0 5px 18px rgba(93,57,15,.08)}.puja-page-type{margin:0 0 8px;color:#d95405;font-size:.73rem;font-weight:700;letter-spacing:.09em;text-transform:uppercase}.puja-page-card h2{margin:0 0 10px;color:#0a4275;font:1.25rem Georgia,serif}.puja-page-card p{margin:0;color:#58616a}.puja-page-steps{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:8px;margin:18px 0 0;padding:0;list-style:none}.puja-page-steps li{padding:7px 8px;border-radius:2px;background:#fff;font-size:.78rem;font-weight:700}.puja-page-actions{display:flex;flex-wrap:wrap;gap:12px;margin-top:22px}.puja-page-actions a{font-size:.87rem;font-weight:700;text-decoration:none}.puja-page-book{color:#d95405}.puja-page-talk{color:#148f4e}.puja-page-actions a:hover{text-decoration:underline}@media(max-width:900px){.puja-page-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}@media(max-width:620px){.puja-page{padding:28px 16px}.puja-page-grid{grid-template-columns:1fr}}
</style>

<section class="puja-page">
    <div class="puja-page-head">
        <p class="muted">SACRED SERVICES</p>
        <h1>विशेष पूजा एवं अनुष्ठान — Vedic Puja Services in Ujjain</h1>
        <p>वैदिक विधि से दोष निवारण, ग्रह शांति और विशेष पूजा सेवाएं।</p>
    </div>
    <div class="puja-page-grid">
        @foreach([
            ['उपचारात्मक अनुष्ठान','कालसर्प दोष शांति पूजन','कुंडली में राहु-केतु के बीच सभी ग्रहों के आने से बने दोष की प्रामाणिक वैदिक शांति।',['जल अभिषेक','नाग पूजा','राहु-केतु मंत्र','दीप दान']],
            ['आध्यात्मिक उपचार','महामृत्युंजय मंत्र जाप','गंभीर बीमारियों, भय और अकाल मृत्यु से बचने के लिए भगवान शिव का शक्तिशाली मंत्र जाप।',['संकल्प विधि','शिवलिंग अभिषेक','निरंतर जाप','पूर्ण आहुति']],
            ['ग्रह शांति','मंगल दोष शांति पूजन','विवाह में देरी और वैवाहिक जीवन की बाधाओं को दूर करने के लिए मंगल ग्रह की शांति।',['मंगलनाथ पूजन','भात पूजा','मंगल मंत्र जाप','लाल वस्तु दान']],
            ['ग्रह शांति','नवग्रह शांति पूजन','जीवन में सुख, शांति और समृद्धि के लिए सभी नौ ग्रहों की वैदिक पूजा और हवन।',['नवग्रह मंडल','ग्रह मंत्र जाप','शांति हवन','विशिष्ट दान']],
            ['पितृ शांति','पितृ दोष शांति पूजन','पूर्वजों की आत्मा की शांति और परिवार की उन्नति के लिए किया जाने वाला पूजन।',['तर्पण विधि','संकल्प पूजन','विष्णु पूजन','ब्राह्मण भोजन']],
            ['उपचारात्मक अनुष्ठान','राहु-केतु शांति पूजन','अचानक आने वाली बाधाओं और मानसिक कष्टों से मुक्ति के लिए छाया ग्रहों की शांति।',['छाया ग्रह जाप','काले तिल दान','केतु मंत्र जाप','शांति हवन']],
            ['आध्यात्मिक उपचार','रुद्राभिषेक पूजन','पंचामृत और वैदिक मंत्रों के साथ शिवलिंग का पवित्र स्नान, भगवान शिव की कृपा हेतु।',['पंचामृत स्नान','रुद्र अष्टाध्यायी','बिल्वपत्र अर्पण','भस्म आरती']],
            ['मांगलिक अनुष्ठान','विवाह पूजा / भात पूजन','सुखी और समृद्ध वैवाहिक जीवन के लिए उज्जैन में प्रामाणिक वैदिक विवाह संस्कार।',['गौरी गणेश पूजा','नवग्रह शांति','सप्तपदी (फेरे)','भात पूजन विधि']]
        ]
            as [$type,$name,$description,$steps])
            <article class="puja-page-card">
                <span class="puja-page-type">{{ $type }}</span>
                <h2>{{ $name }}</h2>
                <p>{{ $description }}</p>
                <ul class="puja-page-steps">@foreach($steps as $step)<li>{{ $step }}</li>@endforeach</ul>
                <div class="puja-page-actions">
                    <a class="puja-page-book" href="https://wa.me/917974639689" target="_blank" rel="noopener">Book Puja Now</a>
                    <a class="puja-page-talk" href="https://wa.me/917974639689" target="_blank" rel="noopener">पंडित जी से बात करें</a>
                </div>
            </article>
        @endforeach
    </div>
</section>
@endsection
