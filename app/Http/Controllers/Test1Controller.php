<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test1Controller extends Controller
{
    public function __invoke() {
        return "целый класс контроллера используется для описания одного метода";
    }
}
