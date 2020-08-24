@extends('layouts.app')

@section('page-title')
    Обновление статьи
@endsection

@section(('content'))
    <h1>Обновление статьи</h1>
    {!! Form::open(['action' => ['ArticlesController@update', $article->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{ Form::label('title', 'Название статьи') }}
        {{ Form::text('title', $article->title, ['class' => 'form-control', 'placeholder' => 'Введите заголовок']) }}
    </div>
    <div class="form-group">
        {{ Form::label('text', 'Текст статьи') }}
        {{ Form::textarea('text', $article->text, ['id' => 'article-ckeditor', 'placeholder' => 'Введите текст']) }}
    </div>
    {{Form::hidden('_method', 'PUT')}}<!--нужно для обновления статьи -->
    {{ Form::file('main_image') }}
    <br>
    <br>
    {{ Form::submit('Обновить', ['class' => 'btn btn-success ']) }}
    {!! Form::close() !!}
    </div>
@endsection
