@extends('layouts.app')
@section('title', 'Portfolio')
@section('content')
    @include('pages.home.partials.hero')

    @include('pages.home.partials.about-preview')

    @include('pages.home.partials.featured-project')

    @include('pages.home.partials.skills')

    {{-- Section disembunyikan agar Landing Page lebih ringkas --}}
    @include('pages.home.partials.certificates')

    @include('pages.home.partials.services')

    @include('pages.home.partials.contact')
    @include('pages.home.partials.cta')
@endsection


