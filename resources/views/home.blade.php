@php
    use App\Models\Guest;
    /**
     * @var Guest $guest
     */
@endphp
@extends('layouts.app')
@section('title', 'Свадьба Дениса и Маши')
@section('content')
    <div class="max-w-[600px] mx-auto relative">
        @include('sections.header')
        @include('sections.hero')
        @include('sections.about')
        @include('sections.schedule')
        @if($guest)
            @include('sections.form')
        @endif
        @include('sections.map')
        @include('sections.footer')
    </div>
@endsection
