@extends('layouts.app')
@section('title','All Projects')

@section('content')
<section class="container mx-auto px-6 pt-40 pb-32">
    <h1 class="section-title">All Projects</h1>

    <div class="grid md:grid-cols-3 gap-8 mt-12">
        <x-project-card title="Portfolio Website" type="Web" />
        <x-project-card title="Rental System" type="Web App" />
        <x-project-card title="UI Design Kit" type="Design" />
    </div>
</section>
@endsection
