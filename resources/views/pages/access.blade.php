@extends('layouts.app')
@section('content')
    <x-common.banner bg-text="Smart Access" tagline="24/7 Smart Access" title="Total control over" col-title="who visits & when"
        para="Open doors for your business with the only gym software featuring built-in Bluetooth access control. Offer a premium, touch-free experience while maximizing your gym's automation."
        button1="Get Started" button2="See How It Works" link1="/contact" link2="#mobile" />

    {{-- Secure --}}
    <x-accesspage.secure />

    {{-- STATS --}}
    <x-accesspage.stats-band />

    {{-- REMOTE MANAGEMENT --}}
    <x-accesspage.mobile />

    {{-- Touch Free --}}
    <x-accesspage.touch-free />

    {{-- Competitive Advantage --}}
    <x-accesspage.advantage :advantages="$advantages" :metrics="$metrics" />

    {{-- Database Sync --}}
    <x-accesspage.database />

    {{-- TAILGATING DETECTION --}}
    <x-accesspage.tailgate />

    {{-- CTA --}}
    <x-common.cta title="Secure your facility today"
        para="Join thousands of gyms worldwide who rely on our smart access control system to run 24/7 with zero front-desk dependency."
        button1="Request a Demo" button2="View Pricing" link1="/contact" link2="/pricing" />
@endsection
