<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
        return view ('frontend.index');
    }
    public function shop ()
    {
        return view ('frontend.shop');
    }
    public function returnProcess () 
    {
        return view ('frontend.return-process');
    }
    public function viewCart ()
    {
        return view ('frontend.view-cart');
    }
    public function checkOut ()
    {
        return view ('frontend.checkout');
    }
    public function categoryProducts ()
    {
        return view ('frontend.category-products');
    }
    public function subCategoryProducts ()
    {
        return view ('frontend.sub-category-products');
    }
}

