@extends('layouts.index')
@section('content')




    @include('components.newsSite.gallery-detail.gallery-main')


@endsection()
@section('script-comments')
    <script>
        button20 = $('#count-20-comments');
        buttonAll = $('#count-all-comments');

        button20.click('click', function (e){
            e.preventDefault();
            console.log('pltcm');
            axios.get("{{route('getCountComments')}}")
                .then(function (response){
                    console.log(response);
                    return  response.data;
                })
        });
    </script>
@endsection
