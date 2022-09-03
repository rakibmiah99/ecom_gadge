@extends('layouts.app')

@section('content')
    <div class="main_content">
        @include('components.OrderComplete.OrderCompleteTop')
        @include('components.OrderComplete.OrderCompleteContent')
        @include('layouts.newslatter')
    </div>
@endsection
