@extends('layouts.app')
@section('content')
    <x-common.banner bg-text="Pricing" tagline="Pricing Plans" title="Flexible plans for every" col-title="growth stage"
        para="Unlock freedom from the front desk with an all-in-one gym management system that works as hard as you do."
        button1="Request Free Demo" button2="Contact Us" link1="/contact" link2="/contact" />

    {{-- Pricing List --}}
    <x-pricingpage.pricing-list />

    {{-- FAQ --}}
    <x-pricingpage.faq />

    {{-- CTA --}}
    <x-common.cta title="Looking for a custom solution?"
        para="Our experts are ready to help you build a bespoke management ecosystem tailored to your unique business requirements."
        button1="Request Consultation" button2="About Us" link1="/contact" link2="/about" />
@endsection
