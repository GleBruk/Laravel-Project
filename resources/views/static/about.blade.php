@extends('layouts.app')

@section('page-title')
    {{$title}}
@endsection

@section(('content'))
    <h1>Страница о нас</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reprehenderit saepe unde? Amet assumenda
        distinctio eaque facere, in, ipsam, laborum maxime necessitatibus nihil unde veritatis voluptas. Asperiores,
        error, officia.</p>

    @if(count($params) > 0)
        <ul class="list-group">
            @foreach($params as $el)
                <li class="list-group-item">{{ $el }}</li>
            @endforeach
        </ul>
    @endif
@endsection
