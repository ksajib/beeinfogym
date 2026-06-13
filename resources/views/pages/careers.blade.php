@extends('layouts.app')
@section('content')
    <x-common.banner bg-text="Careers" tagline="Join our team" title="Build the future of" col-title="gym tech"
        para="We're a fast-growing team on a mission to revolutionize fitness management across Bangladesh. If you love building products people actually use — you'll fit right in."
        button1="Read our blog" button2="Contact Us" link1="/fitness-blog" link2="/contact" />

    {{-- Careers Filter --}}
    <x-careerspage.career-search />

    {{-- Main Body --}}
    <x-careerspage.career-main />

    {{-- CTA --}}
    <x-common.cta title="Ready to join the team?"
        para="Browse open positions above or send us an open application — we're always on the lookout for exceptional people."
        button1="Request Consultation" button2="About Us" link1="/contact" link2="/about" />
@endsection
