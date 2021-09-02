@extends('layouts.index')

@section('content')
    @if(request()->route()->action['prefix'] === 'all-gallery')
        @include('components.newsSite.pageGallery.allPhoto')
    @else
        @include('components.newsSite.pageNews.allNews')
    @endif
@endsection
