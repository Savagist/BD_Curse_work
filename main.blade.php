<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tables</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">
</head>
<body>
<div class="topnav">
    <a href="{{route("heroes")}}">Герои</a>
    <a href="{{route("armor")}}">Броня</a>
    <a href="{{route("move_speed")}}">Скорость передвижения</a>
    <a href="{{route("complexity")}}">Сложность</a>
    <a href="{{route("main_attribute")}}">Основной атрибут</a>
    <a href="{{route("position")}}">Позиция</a>
    <a href="{{route("attack")}}">Урон</a>
    <a href="{{route("attack_type")}}">Тип атаки</a>

</div>

<section class="first">
    <div class="container">
        <h1 class="display-6 ">
            <strong>{{$name}}</strong>
        </h1>
        <form method="post" action="/{{Route::currentRouteName()}}/delete/">
            @csrf
            <table class="table table-primary table-striped">
                <tr>
                    <th>Выбрать</th>
                    @foreach($row_name as $el)
                        <th>{{$el}}</th>
                    @endforeach
                </tr>


                @foreach($data as $value)
                    <tr>
                        <td><input class="form-check-input" type="checkbox" name="id[]" value={{$value->id}}}></td>
                        @foreach(get_object_vars($value) as $el)
                            <td>{{$el}}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>

            <button class="btn btn-primary" data-rel="back" type="submit">УДАЛИТЬ</button>
        </form>
    </div>
</section>

<section class="second">
    <div class="container">
        <h1 class="display-6">Редактирование</h1>
        <form class="second-form border border-5 border-info" method="post">
            @csrf
            <div class="container">
                <div class="row">
                    @for($i = 0; $i < count($type); $i++)
                        <label class="col-form-label">{{$row_name[$i]}}</label>

                        @if($type[$i] == 'text')
                            <input type="text" maxlength="128" name="{{array_keys(get_object_vars($data[0]))[$i]}}"
                                   class="form-control"/>
                        @elseif($type[$i] == 'number')
                            <input type="number" name="{{array_keys(get_object_vars($data[0]))[$i]}}"
                                   class="form-control"/>
                        @elseif($type[$i] == 'bool')
                            <input type="number" max="1" min="0" name="{{array_keys(get_object_vars($data[0]))[$i]}}"
                                   class="form-control"/>
                        @elseif($type[$i] == 'date')
                            <input type="date" name="{{array_keys(get_object_vars($data[0]))[$i]}}"
                                   class="form-control"/>
                        @elseif($type[$i] == 'real')
                            <input type="number" name="{{array_keys(get_object_vars($data[0]))[$i]}}"
                                   class="form-control" step="0.01"/>
                        @endif

                    @endfor
                </div>
                <div class="row buttons" style="margin-bottom: 20px">
                    <button class="btn btn-primary" style="width: 48%; margin-right: 2%" type="submit"
                            formaction="/{{Route::currentRouteName()}}/insert">ДОБАВИТЬ
                    </button>
                    <button class="btn btn-primary" style="width: 48%; margin-left: 2%" type="submit"
                            formaction="/{{Route::currentRouteName()}}/update">ОБНОВИТЬ
                    </button>
                </div>
            </div>

        </form>
    </div>
</section>


</body>
</html>
