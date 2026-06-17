@extends('layouts.app')
@section('content')
    <x-common.banner bg-text="contact" tagline="Let's Connect" title="Help you grow your" col-title="fitness business"
        para="Ready to simplify your gym operations and grow your fitness business? Reach out to BeeInfo and let's build something powerful together."
        button1="Request Free Demo" button2="View Pricing" link1="/contact" link2="/pricing" />

    {{-- Contact Form --}}
    <x-contactpage.contact-form />

    {{-- Form --}}
    <x-contactpage.map />
@endsection
