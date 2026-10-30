<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@foreach($posts as $post)
    <div>
        <h2>{{ $post->title }}</h2>
        <div> {{ $post->text }}</div>
        <div>количество лайков {{ $post->likes }}</div>
    </div>
@endforeach
<hr>
@foreach($persons as $person)
    <div>
        <h2>iмя:{{$person->name}}</h2>
        <div>пiчта: {{$person->email}}</div>
        <div>вiзраст: {{$person->age}}</div>
        <div>зп: {{$person->salary}}</div>
        <br>
    </div>

@endforeach

<h2>Логи запросов скьюэль</h2>
@foreach($logs as $log)
    <div>
        <div>Запрос:  {{ $log['query'] }} </div>
        <div>Веремя выполнения запроса: {{$log['time'] }}</div>
        <div>Тип выполняемого запроса: {{$log['readWriteType'] }} </div>
        <br>
    </div>
@endforeach

<div>

    <br>
    {{ $sql3 }}
    {{ $sql4 }}
</div>


</body>
</html>
