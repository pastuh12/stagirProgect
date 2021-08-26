@extends('layouts.index')

@section('content')
    @include('components.newsSite.pageGallery.categories')
    @include('components.newsSite.pageGallery.allPhoto')
    @include('components.newsSite.pageGallery.addGallery')
@endsection
