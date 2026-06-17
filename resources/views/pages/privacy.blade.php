@extends('layouts.app')
@section('content')
    <x-common.banner2 bg-text="Policy" tagline="Legal Document" title="Privacy policy" col-title=""
        para="Your privacy is our priority. Learn how we collect, use, protect, and give you control over your personal data." />

    {{-- Tarms --}}
    <x-privacypage.terms />

    {{-- CONTACT BAND --}}
    <x-privacypage.contact />

    {{-- RELATED PAGES --}}
    <x-privacypage.related />

    {{-- CTA --}}
    <x-common.cta title="Manage your gym with confidence"
        para="Join 110+ gyms across Bangladesh who trust BeeInfo to manage their operations securely and professionally."
        button1="Request a Demo" button2="View Pricing" link1="/contact" link2="/pricing" />
@endsection
