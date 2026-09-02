@extends('layouts.app')
@section('title', 'Vedic Guides | Raghav')
@section('content')
<style>
    .guides-heading { max-width: 800px; margin-bottom: 28px; }
    .guides-heading h1 { margin-bottom: 8px; color: #0a4275; }
    .guide-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 20px; }
    .guide-card { display: flex; flex-direction: column; }
    .guide-card h2 { color: #0a4275; font-family: Georgia, serif; line-height: 1.35; }
    .guide-card p { color: #4e575f; line-height: 1.7; }
    .guide-button { margin-top: auto; border-color: #e95b09; background: #e95b09; color: #fff; }
    .guide-button:hover { background: #c54500; color: #fff; }
    @media (max-width: 820px) { .guide-grid { grid-template-columns: 1fr; } }
</style>
<div class="container">
    <section class="guides-heading">
        <p class="muted">पूजा एवं वैदिक मार्गदर्शिका</p>
        <h1>पूजा, मंत्र और दोष शांति की सम्पूर्ण जानकारी</h1>
        <p class="muted">नीचे दिए गए विषयों को समझें और विस्तृत जानकारी के लिए संबंधित लेख पढ़ें।</p>
    </section>

    <section class="guide-grid">
        <article class="card guide-card">
            <h2>महामृत्युंजय जाप: लाभ, विधि और कब करना चाहिए</h2>
            <p>महामृत्युंजय मंत्र भगवान शिव को समर्पित वैदिक मंत्र है। श्रद्धालु इसे मानसिक शांति, स्वास्थ्य के लिए प्रार्थना, भय से मुक्ति और आध्यात्मिक बल की कामना से जपते हैं। लेख में मंत्र का अर्थ, जप की तैयारी, सही उच्चारण, संकल्प तथा जप या हवन के सामान्य नियम विस्तार से जानें।</p>
            <a class="button guide-button" href="https://www.drikpanchang.com/vedic-mantra/gods/lord-shiva/mantra/maha-mrityunjaya-mantra.html?lang=hi" target="_blank" rel="noopener">Read Full Article</a>
        </article>

        <article class="card guide-card">
            <h2>मंगल भात पूजा: विवाह में देरी और मंगल दोष की जानकारी</h2>
            <p>मंगल दोष को विवाह और वैवाहिक सामंजस्य के संदर्भ में देखा जाता है। उज्जैन का मंगलनाथ मंदिर मंगल ग्रह की आराधना के लिए प्रसिद्ध है। इस लेख में मंगल दोष से जुड़ी पारंपरिक मान्यताएँ, पूजा का महत्व, आवश्यक तैयारी और पूजा कराने से पहले कुंडली का उचित परामर्श लेने की जानकारी प्राप्त करें।</p>
            <a class="button guide-button" href="https://www.mahakaldarshan.co.in/blog/mangalnath-bhat-puja-cost-ujjain" target="_blank" rel="noopener">Read Full Article</a>
        </article>

        <article class="card guide-card">
            <h2>काल सर्प दोष: क्या होता है और शांति कैसे करें</h2>
            <p>वैदिक ज्योतिष में काल सर्प दोष को राहु-केतु की स्थिति से जुड़ी एक कुंडली-रचना माना जाता है। इसके प्रभाव व्यक्ति की पूरी कुंडली, दशा और ग्रहों की स्थिति पर निर्भर माने जाते हैं। विस्तृत लेख में इसकी पहचान, विभिन्न रूप, शिव उपासना, राहु-केतु शांति तथा योग्य ज्योतिषी से व्यक्तिगत परामर्श के महत्व को समझें।</p>
            <a class="button guide-button" href="https://www.srimandir.com/my-kundli/doshas/kaal-sarp-dosha" target="_blank" rel="noopener">Read Full Article</a>
        </article>
    </section>
</div>
@endsection
