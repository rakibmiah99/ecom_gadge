@extends('layouts.app')

@section('content')
    @include('components.returns.returns-top')
    <div class="main_content">
        @include('components.returns.returns-content')
        @include('layouts.newslatter')
    </div>
@endsection

