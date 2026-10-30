<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index() {
        $authors = DB::table('authors')->get();
        $books = DB::table('books')->join('authors', 'authors.id', '=', 'books.author_id')->where('price','>','1000')->get();


        return view('authorbook', ['authors' => $authors, 'books' => $books]);
    }
}
