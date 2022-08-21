@extends('layouts.app')

@section('content')
    @include('components.contact.contact-top')
    <div class="main_content">
        @include('components.contact.contact-form')
        @include('components.about.about-team')
        @include('layouts.newslatter')
    </div>
@endsection

