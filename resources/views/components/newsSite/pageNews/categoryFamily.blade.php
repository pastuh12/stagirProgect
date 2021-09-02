<div>
    <h4>
        Похожие рубрики
    </h4>
    <div>
        @foreach($family as $value)
            <a class="btn btn-primary" href="{{route('rubric', $value->id)}}" role="button">{{$value->title}}</a>
        @endforeach
    </div>

</div>
