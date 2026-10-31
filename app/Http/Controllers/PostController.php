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

    }
}
