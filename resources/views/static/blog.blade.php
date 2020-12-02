@extends('layouts.app')

@section('page-title')
    {{$title}}
@endsection

@section(('content'))
    <!-- Если из контроллера передаются записи, то выводим их через цикл -->
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="alert alert-info">
                <h1>{{$post['post_title']}}</h1>
                <div>{{$post['post_content']}}</div><br>
                <button class="btn btn-success">Детальнее</button>
            </div>
        @endforeach
    @endif
@endsection
