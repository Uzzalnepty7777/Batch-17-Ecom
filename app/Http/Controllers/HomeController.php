<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index ()
    {
       $categories = Category::get();
        return view('frontend.index', compact('categories'));
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
    public function categoryProducts ($id)
    {
        $products = Product::where('cat_id',$id)->get();
        return view ('frontend.category-products', compact('products'));
    }
    public function subCategoryProducts ()
    {
        return view ('frontend.sub-category-products');
    }
    public function productDetails ()
    {
        return view ('frontend.product-details');
    }
    public function viewTypeProducts ()
    {
        return view ('frontend.view-type-products');
    }
    public function privacyPolicy ()
    {
        return view ('frontend.privacy-policy');
    }
    public function termsConditions ()
    {
        return view ('frontend.terms-conditions');
    }
    public function refundPolicy ()
    {
        return view ('frontend.refund-policy');
    }
    public function paymentPolicy ()
    {
        return view ('frontend.payment-policy');
    }
    public function aboutUs ()
    {
        return view ('frontend.about-us');
    }
    public function contactUs ()
    {
        return view ('frontend.contact-us');
    }
  
}

