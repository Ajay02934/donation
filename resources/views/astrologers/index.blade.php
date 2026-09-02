@extends('layouts.app')
@section('title', 'Pandit in Ujjain | Raghav Puja & Jyotish Kendra')
@section('meta')
<meta name="description" content="Learn about Raghav Puja &amp; Jyotish Kendra's Vedic pandit and puja guidance in Ujjain for ceremonies and personal consultations.">
<link rel="canonical" href="https://raghavjyotishujjain.online/astrologers">
<meta property="og:type" content="website">
<meta property="og:url" content="https://raghavjyotishujjain.online/astrologers">
<meta property="og:title" content="Pandit &amp; Vedic Puja Guidance in Ujjain | Raghav">
<meta property="og:description" content="Learn about Raghav Puja &amp; Jyotish Kendra's Vedic pandit and puja guidance in Ujjain.">
@endsection
@section('content')
<style>
    .acharya-intro { max-width: 900px; margin: 0 auto; text-align: center; }
    .acharya-intro h1 { margin-bottom: 10px; color: #0a4275; }
    .acharya-intro h2 { margin: 0 0 20px; color: #d95405; font-family: Georgia, serif; }
    .acharya-intro > p { max-width: 760px; margin: 0 auto; color: #4e575f; line-height: 1.75; }
    .acharya-name { margin: 28px auto 0; padding: 22px; border: 1px solid #f0d6b2; background: #fffaf2; }
    .acharya-name h2 { margin: 0; color: #0a4275; }
    .acharya-stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; max-width: 900px; margin: 28px auto 0; }
    .acharya-stat { padding: 22px 16px; border: 1px solid #f0d6b2; background: #fffaf2; text-align: center; }
    .acharya-stat strong { display: block; margin-bottom: 6px; color: #d95405; font-size: 1.25rem; }
    @media (max-width: 620px) { .acharya-stats { grid-template-columns: 1fr; } }
</style>
<div class="container">
    <section class="acharya-intro">
        <p class="muted">हमारे आचार्य</p>
        <h1>विश्वसनीय वैदिक पंडित – उज्जैन महाकाल की नगरी से</h1>
        <h2>प्रामाणिक वैदिक परामर्श एवं पूजन सेवा</h2>
        <p>उज्जैन के अनुभवी वैदिक पंडित द्वारा कालसर्प दोष पूजा, मंगल भात पूजा, नवग्रह शांति एवं महामृत्युंजय जाप जैसे शक्तिशाली अनुष्ठानों को शुद्ध वैदिक विधि से संपन्न कराया जाता है।</p>
        <div class="acharya-name">
            <h2>पंडित Rajesh Sharma</h2>
        </div>
        <div class="acharya-stats">
            <div class="acharya-stat"><strong>15+ वर्षों का अनुभव</strong></div>
            <div class="acharya-stat"><strong>1000+ सफल पूजन</strong></div>
            <div class="acharya-stat"><strong>उज्जैन महाकाल से सीधा संबंध</strong></div>
        </div>
    </section>
</div>
@endsection
