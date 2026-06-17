@extends('layouts.app')
@section('content')
    <x-common.banner bg-text="Deletion" tagline="Sensitive Action" title="Account deletion" col-title=""
        para="We're sorry to see you go. Please complete the form below to submit your data deletion request. This action is permanent and irreversible."
        button1="Request Free Demo" button2="Contact Us" link1="/" link2="/contact" />

    <x-deletionpage.form />

    <x-privacypage.related />
@endsection
