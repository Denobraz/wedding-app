@php
    use App\Models\Guest;
    /**
     * @var Guest $guest
     */
@endphp
@extends('layouts.app')
@section('title', 'Денис и Мария')
@section('content')
    <div class="max-w-[600px] mx-auto relative">
        @include('sections.header')
        @include('sections.hero')
        @include('sections.about')
        @if($guest && !$guest->formIsSubmitted())
            @include('sections.form')
        @endif
        @include('sections.schedule')
        @include('sections.map')
        @include('sections.footer')
    </div>
@endsection
