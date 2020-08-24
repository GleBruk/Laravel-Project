@extends('layout.main')

@section(('content'))
        <div class="alert alert-info">
            <h3>{{ $item->title }}</h3>
            <p>{{ $item->anons }}</p>
            <p><b>Цена: </b> {{ $item->price }} рублей</p>
            <a href=/shop{{ $item->id }}" class="btn btn-info">Купить</a>
        </div>
@endsection
