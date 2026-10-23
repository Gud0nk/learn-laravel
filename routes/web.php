<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TestController;
use \App\Http\Controllers\Test1Controller;
use \App\Http\Controllers\Test4Controller;

Route::get('/', function () {
    return view('welcome', ['name'=> '123']);
});

// маршрут '/testing' обрабатывается только при ГЕТ методе
// именованный маршрут
Route::get('/testing', function () {
    return "Hello World";
})->name('testing');
// маршрут '/testing/match' обрабатывается при ГЕТ и ПОСТ методе
Route::match(['get', 'post'], '/testing/match', function () {
    return "данное сообщение отобразится при гете и посте";
});
// маршрут '/testing' обрабатывается при любом методе
Route::any('/testing/any', function () {
    return "данное собщение отобразится при любом методе";
});
Route::get('/testing/test3', function (Request $request) {
   return dump($request);
});
Route::get('/testing/test4', function () {
    return '
    <form action="/testing/test4" method="POST">
    <input type="text" name="login" placeholder="введите логин" required>
    <input type="password" name="password" placeholder="введите parol" required>
    <button type="submit">Отправить</button>
    </form>
    ';
});
// получение данных хттп запроса в переменную реквест $реквест
Route::post('/testing/test4', function (Request $request) {
    return $request->all();
});
// данный маршрут перенаправляет на вторую ссылку
Route::redirect('/testing/test5', '/testing');  // возврат 302
Route::redirect('/testing/test6', '/testing', 301);     // возврат 301
Route::permanentRedirect('/testing/test6', '/testing');       // возврат 301
// маршрут представлений
route::view('/testing/test8', 'welcome');
route::view('/testing/test9', 'welcome', ['name' => 'гудочичек']);
// параметры маршрута {}
Route::get('/testing/test10/{id}', function (string $id) {
    return 'вы указали id:' . $id;
});
Route::get('/testing/test10/{id}', function (Request $request,string $id, string $name) {
    return 'вы указали id:' . $id . ', Имя: ' . $name;
});
Route::get('/testing/test11/{id?}', function (?string $id = null) {
    return 'вы указали id:' . $id;
});
// Ограничение регулярного выражения
Route::get('/testing/test12/{id}', function (string $id ) {
    return 'вы указали id:' . $id;
})->where('id', '[0-9]+');

Route::get('/testing/test13/{name}', function (string $name ) {
    return 'вы указали name:' . $name;
})->where('name', '[A-Za-zА-Яа-яЁё]+');

Route::get('/testing/test14/{id}/{name}', function ( string $id, string $name) {
    return 'вы указали id:' . $id . ', Имя: ' . $name;
})->where(['id' => '[0-9]+', 'name' => '[A-Za-zА-Яа-я]+']);
// использование именованного маршрута с помощью route('имя_маршрута')
Route::get('/testing/test15/{name}', function () {
   return redirect()->route('testing');
});
// создание url адресов для именованных маршрутов
Route::get('/testing/test16/{id}', function (string $id) {
    return $url = route('test16', ['id' => $id]);
})->name('test16');
/*
Route::get('/testing/test17/', function () {
    return 17;
});
Route::get('/testing/test18/', function () {
    return 18;
});
Route::get('/testing/test19/', function () {
    return 19;
});
*/
Route::prefix('testing')->group(function () {
   Route::get('/test17/{id}', function () { return 17;});
   Route::get('/test18/{id}', function () { return 18;});
   Route::get('/test19/{id}', function () { return 19;});
});
// CODE.MU
Route::get('/user/{id}', function ($id) {
    return 'user: ' . $id;
});
Route::get('/user/{name}', function ($name) {
    return 'user: ' . $name;
});
Route::get('/city/{name}', function ($name) {
    return 'city: ' . $name;
});

Route::get('/post/{catId}/{postId}', function ($catId, $postId) {
    return $catId . ' ' . $postId;
});

Route::get('/city/city/{city?}', function ($city = 'minsk') {
    return 'city ' . $city;
});

Route::get('/post/{slug}/{id}', function ($slug, $id) {
    return 'post ' . $slug . ' ' . $id;
});

Route::get('/post/{slug}/{id}', function ($slug, $id) {
    return 'post ' . $slug . ' ' . $id;
})->where([
    'slug' => '[a-z0-9_-]+',
    'id' => '[0-9]+',
]);

Route::prefix('/test')->group(function () {
    Route::get('/test', [TestController::class , 'index'])->name('test');
    Route::get('/test/create', [TestController::class, 'create'])->name('test.create');
    Route::post('/test', [TestController::class, 'store'])->name('test.store');
    Route::get('/test/{id}', [TestController::class, 'show'])->name('test.show');
    Route::post('/test/{id}', [TestController::class, 'update'])->name('test.update');
    Route::get('/test/{id}/delete', [TestController::class, 'destroy'])->name('test.destroy');
});
Route::get('/test1', Test1Controller::class);

Route::get('/test4/{name?}', [Test4Controller::class, 'index'])->name('test4');
