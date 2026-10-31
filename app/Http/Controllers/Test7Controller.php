<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class Test7Controller extends Controller
{
    public function index() {
        //$product = Product::find(5);
        //$product->delete();
        Product::destroy(1);

        //$product = Product::find(3);
        //$product->name = 'сыр4';
        //$product->description = 'сыр с абломоном';
        //$product->save();

        /*$product = Product::find(4);
        $product->update([
            'name' => 'снежок',
            'description' => 'сладенькая',
            'date' => '1980-10-10'
        ]);

        return Product::all();*/

        //$products = Product::where('id', '=', 2)->first();
        //$products = Product::find(2);
        /*$newproduct = new Product();
        $newproduct->name = 'рёженка';
        $newproduct->description = 'рёженка';
        $newproduct->price = 777;
        $newproduct->date = '2020-12-10';
        $newproduct->quantity = 123;
        $newproduct->active = true;
        $newproduct->category_id = 1;
        $newproduct->save();

       $new = Product::create([
            'name' => 'ряженка',
            'description' => 'ряженка сладкая',
            'price' => 1000,
            'date' => '2020-12-10',
            'quantity' => 10,
            'active' => true,
            'category_id' => 1
        ]);


        $products = Product::all();
        return $products;
        */

        return view('test7.index');
    }
}
