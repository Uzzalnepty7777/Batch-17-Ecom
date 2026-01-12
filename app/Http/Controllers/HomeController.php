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
}
