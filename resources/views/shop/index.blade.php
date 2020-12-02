@extends('layout.main')

@section(('content'))
    <!-- Если передаются товары из контроллера, то выводим их через цикл. Иначе выводим
    сообщение, что их нет -->
    @if(count($items) > 0)
        @foreach($items as $el)
            <div class="alert alert-info">
                <h3>{{ $el->title }}</h3>
                <p>{{ $el->anons }}</p>
                <p><b>Цена: </b> {{ $el->price }} рублей</p>
                <a href=/public/shop/{{ $el->id }}" class="btn btn-success">Детальнее</a>
            </div>
        @endforeach
    @else
        <p>На данный момент товаров нет</p>
    @endif
@endsection
