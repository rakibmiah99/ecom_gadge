@extends('layouts.app')

@section('content')
    @include('components.faq.faq-top')
    <div class="main_content">
        @include('components.faq.faq-content')
        @include('layouts.newslatter')
    </div>
@endsection

