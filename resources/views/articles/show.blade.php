@extends('layouts.app')

@section('page-title')
    Статья на сайте
@endsection

@section('content')
    <a href="/public/articles" class="btn btn-warning">Назад</a>

    <h1>{{ $data['article']->title }}</h1>

    <div>
        <p>{!! $data['article']->text !!}</p>
        <p>Дата создания: {{ $data['article']->created_at }}</p>
    </div>
    @if(count($data['comments']) > 0)
        @foreach($data['comments'] as $comm)
            <div class="alert alert-info">{{ $comm->text }}</div>
        @endforeach
    @endif

    <h1>Форма комментариев</h1>
    {!! Form::open(['action' => 'ArticlesController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('text', 'Комментарий') }}
        {{ Form::textarea('text', '', ['class' => 'form-control', 'placeholder' => 'Введите комментарий']) }}
    </div>
    {{--    нам необходимо в форму также передавать id статьи, ибо это поле также необходимо помещать в таблицу с комментариями--}}
    {{ Form::hidden('article_id', $data['article']->id) }}
    {{ Form::submit('Добавить', ['class' => 'btn btn-success']) }}
    {!! Form::close() !!}
    @if(!Auth::guest())<!--Если пользоваетель авторизован -->
        @if(Auth::user()->id == $data['article']->user_id)
            <hr>
            <a href="/public/articles/{{$data['article']->id}}/edit" class="btn btn-warning">Редактировать</a>
            <br><br>
            {!! Form::open(['action' => ['ArticlesController@destroy', $data['article']->id], 'method' => 'POST']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Удалить запись', ['class' => 'btn btn-danger']) }}
            {!! Form::close() !!}
        @endif
    @endif
@endsection
