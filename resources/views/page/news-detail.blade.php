@extends('layouts.index')
@section('content')


@include('components.newsSite.news-detail.news-main')


@endsection()
@section('script-comments')
    <script>
{{--        @dd(get_class($news))--}}
        button20 = $('#count-20-comments');
        buttonAll = $('#count-all-comments');
        button20.click(('click', function (e){
            e.preventDefault();
            console.log('kmkmkm');
            axios.get("{{route('getCountComments', ['entity' => get_class($news),'id' => $news->id,'count' => 20 ])}}")
                .then(function (response){
                    console.log(response);
                    return  response.data;
                })
        }));
    </script>
@endsection
