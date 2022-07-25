<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $fruits = array('Mango', 'Orange', 'Banana', 'Apple', 'Pineapple');
        return view('welcome', compact('fruits'));
    }

    public function addProducts()
    {
        $products = [
            ["name"=>"Phone"],
            ["name"=>"Tablet"],
            ["name"=>"Laptops"],
            ["name"=>"Watch"],
            ["name"=>"Television"],
            ["name"=>"Freeze"],
        ];

        Product::insert($products);
        return "Product has been inserted successfully!";
    }

    public function search()
    {
        return view('search');
    }

    public function autocomplete(Request $request)
    {
        $datas = Product::select("name")
                        ->where("name", "LIKE", "%{$request->terms}%")
                        ->get();
        return response()->json($datas);
    }
}
