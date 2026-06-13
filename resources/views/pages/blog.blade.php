@extends('layouts.app')
@section('content')
    <x-common.banner bg-text="Fitness Blog" tagline="Fitness Blog" title="Gym management insights" col-title=""
        para="Expert tips, industry trends, and real stories from gym owners — everything you need to grow your fitness business smarter." />

    {{-- Filter --}}
    <x-blogpage.filter />

    {{-- Blogs --}}
    <x-blogpage.blogs />

    {{-- CTA --}}
    <x-common.cta title="Never miss an insight"
        para="Subscribe to the BeeInfo newsletter for weekly gym management tips, industry news, and product updates delivered straight to your inbox."
        button1="Request a Demo" button2="View Pricing" link1="/contact" link2="/pricing" />
@endsection
