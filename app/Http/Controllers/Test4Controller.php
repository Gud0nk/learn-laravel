<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test4Controller extends Controller
{
    public function index(Request $request, string $name = "Параметр пуст") {
        return view('test4', ['request' => $request, 'name' => $name]);

    }
}
