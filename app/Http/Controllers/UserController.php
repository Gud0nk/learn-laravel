<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show() {
        return "ето шоу";
    }
    public function all() {
        return "ето олл";
    }
    public function info() {
        return "ето инфо";
    }
}
