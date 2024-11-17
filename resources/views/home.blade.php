@extends('layouts.app')
@section('title', 'Денис и Мария')
@section('content')
    <div class="max-w-[600px] mx-auto relative">
        @include('sections.header')
        @include('sections.hero')
        @include('sections.about')
        @include('sections.form')
        @include('sections.schedule')
    </div>
@endsection
