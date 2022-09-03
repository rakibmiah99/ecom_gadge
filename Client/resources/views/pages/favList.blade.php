@extends('layouts.app')

@section('content')
    @include('components.favList.fav-top')
    <div class="main_content">
        @include('components.favList.fav-list')
        @include('layouts.newslatter')
    </div>
@endsection
