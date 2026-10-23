<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {
        return "vera v boga";
    }
    public function show($id) {
        return "vera v boga po id $id";
    }
    public function create() {
        return "forma dlya cozdaniya new object";
    }
    public function store(Request $request) {
        return "cozdanie new object";
    }
    public function edit($id) {
        return "forma dlya redaktirovaniya object po ego id $id";
    }
    public function update(Request $request, $id) {
        return "update dannie ob object po ego id $id";
    }
    public function destroy($id) {
        return "delete object po ego id $id";
    }
}
