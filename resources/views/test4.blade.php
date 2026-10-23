<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script href="{{asset('assets/javascript/script.js')}}"></script>
</head>
<body>

</body>
</html>
<form method="post" action="{{ route('test4', ['name' => $name]) }}">
    <input type="text" name="login" value="dasdasdasdas">
    <button type="submit">отправить</button>
</form>

<p>telo: {{ print_r($request->all()) }}</p>
<p>parametr: {{$name}}</p>

@if($request->isMethod('get'))
    <p>это метод гет</p>
@endif
@if($request->isMethod('post'))
    <p>это метод пост</p>
@endif

<img style="width: 100px" src=" {{ asset('assets/images/orig.webp') }}" alt="#">
<img style="width: 500px" src=" {{ asset('assets/images/cd2bf7ff0bb34e79cd294c41f6ce40b0.jpg') }}" alt="#">
