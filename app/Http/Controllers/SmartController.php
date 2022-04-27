<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class SmartController extends Controller
{
    

    public function goHome()
    {
        $products = DB::table('products')->select('*')->get();

        return view('home')->with('products', $products);
    }

    public function importProducts()
    {
        $products = DB::table('products')->select('*')->get();

        return view('home')->with('products', $products);
    }

}
