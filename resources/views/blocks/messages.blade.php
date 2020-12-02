{{-- Если из контроллера передаются ошибки, то перебираем их через цикл --}}
@if(count($errors) > 0)
    @foreach($errors->all() as $el)
        <?php
            if($el == "Поле title является обязательным.")
                $el = "Необходимо добавить название для статьи";
        ?>
        <div class="alert alert-danger">
            {{ $el }}
        </div>
    @endforeach
@endif

{{-- Если нет ошибок, то выводим сообщение об успехе --}}
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

{{-- Если есть ошибки, то выводим их --}}
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

