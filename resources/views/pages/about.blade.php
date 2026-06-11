@extends('layouts.app')
@section('content')
    <x-common.banner bg-text="about" tagline="About Beeinfo" title="Empowering fitness" col-title="through innovation"
        para="We are more than just a software provider — we are your strategic growth partners in the fitness industry, combining cutting-edge cloud technology with a deep understanding of gym operations."
        button1="Our Mission" button2="Our Journey" link1="#management" link2="#journey" />

    {{-- Our Mission --}}
    <x-aboutpage.our-mission />

    {{-- STATS BAND --}}
    <x-aboutpage.stats-band />

    {{-- DEDICATED --}}
    <x-aboutpage.dedicated />

    {{-- SCALABLE --}}
    <x-aboutpage.scalable />

    {{-- JOURNEY --}}
    <x-aboutpage.journey />

    {{-- TRUSTED IN BANGLADESH --}}
    <x-aboutpage.trusted />

    {{-- VALUES --}}
    <x-aboutpage.values />

    {{-- CTA --}}
    <x-common.cta title="Ready to build something extraordinary?"
        para="Discover how our ecosystem can drive your facility's growth and operational excellence. Let's talk."
        button1="Consult Our Experts" button2="View Pricing" link1="/contact" link2="/pricing" />
@endsection
