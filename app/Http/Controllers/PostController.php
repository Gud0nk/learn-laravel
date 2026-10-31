<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class PostController extends Controller
{
    public function show() {
        $posts = Post::all();
        $users = User::all();
        foreach ($posts as $post) {
            dump($post->title);
            dump($post->text);
        }
        foreach ($users as $user) {
            dump($user->name);

        }
        /*
        $users = User::where('age', 30)->get();     // гореусловия
        dump($users);
        $user = User::where('email', 'test@example.com')->first();
        dump($user);
        $post = Post::where('id', 1)->first();  // вывод первого элемента
        dump($post);
        */
        $post = Post::find(3);  // получение данных по айдишнику в горемоделях

        $post = new Post;
        $post->title = 'Title';
        $post->text = 'Text';           // создание
        $post->save();

        $post = Post::find(1);
        $post->title = 'new title';     // изменение
        $post->save();

        $post = Post::find(1);          // удаление
        $post->delete();

        Post::find(1)->delete();        // удаление по другому
        $deletedRows = Post::where('id', '>', 3)->delete(); // а так много удаления, группой прям

        Post::destroy(1);               // удаление крутое очень
        Post::destroy([1,2,3]);         // удаление групп крутое очень
        Post::destroy(1, 2, 3);         // удаление групп по другому крутое очень
        User::destroy(3,4,5,6);

        $user = User::find(1);
        $user->delete();
        $users = User::withTrashed()->get();    // увидеть мягко удаленные заПИси

        $user = User::withTrashed()->find(1);   // востановление мягких записей
        $user->restore();

        $user->forceDelete();                   // окончательное удаление из базы
        $user->save();
        dump($post->created_at);                // просмотр вермя со
        dump($post->updated_at);

        $user111 = User::where('age', 30)->first();

        $post=Post::find(1);
        dump($post->thumbnail);




        return view('test7.index', ['user111' => $user111]);    // вывод в представление


    }
}
