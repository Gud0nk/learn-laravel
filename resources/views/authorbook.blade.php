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
<h1 style="background-color:#45668e; color:white; padding-left: 10px;">Авторы:</h1>
@foreach($authors as $author)
    <div>
        <h3 >Имя автора: {{$author->name}}</h3>
    </div>
@endforeach
<hr>
<h1 style="background-color:#45668e; color:white; padding-left: 10px;">Книги: </h1>
@foreach($books as $book)
    <div>
        <h3>Название книги: {{$book->title }}</h3>
        <h4>Стоимость: {{$book->price}}</h4>
        <h4>Автор книги: {{$book->name}}</h4>
    </div>

@endforeach


</body>
</html>
