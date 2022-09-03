@extends('layouts.app')
@section('content')
    @include('components.about.about-top')
    <div class="main_content">
        @include('components.about.about-content')
        @include('components.about.about-team')
        @include('layouts.newslatter')
    </div>
@endsection

