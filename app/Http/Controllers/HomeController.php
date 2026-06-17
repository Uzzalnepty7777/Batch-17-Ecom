<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $hotProducts = Product::where('product_type', 'hot')->get();
        $newProducts = Product::where('product_type', 'new')->get();
        $regularProducts = Product::where('product_type', 'regular')->get();
        $discountProducts = Product::where('product_type', 'discount')->get();
        return view('frontend.index', compact('categories', 'hotProducts', 'newProducts', 'regularProducts', 'discountProducts'));
    }
    public function shop()
    {
        return view('frontend.shop');
    }
    public function returnProcess()
    {
        return view('frontend.return-process');
    }
    public function viewCart()
    {
        return view('frontend.view-cart');
    }
    public function checkOut()
    {
        return view('frontend.checkout');
    }
    public function categoryProducts($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('cat_id', $category->id)->get();
        $productCount = $products->count();
        return view('frontend.category-products', compact('products', 'productCount', 'category'));
    }
    public function subCategoryProducts()
    {
        return view('frontend.sub-category-products');
    }
    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->with('color', 'size', 'galleryImage')->first();
        $categories = Category::get();
        return view('frontend.product-details', compact('product', 'categories'));
    }
    public function viewTypeProducts()
    {
        return view('frontend.view-type-products');
    }
    public function privacyPolicy()
    {
        return view('frontend.privacy-policy');
    }
    public function termsConditions()
    {
        return view('frontend.terms-conditions');
    }
    public function refundPolicy()
    {
        return view('frontend.refund-policy');
    }
    public function paymentPolicy()
    {
        return view('frontend.payment-policy');
    }
    public function aboutUs()
    {
        return view('frontend.about-us');
    }
    public function contactUs()
    {
        return view('frontend.contact-us');
    }
    //Cart Functions...
    public function addToCartDetails(Request $request)
    {
        $previousCart = Cart::where('product_id', $request->product_id)->where('ip_address', $request->ip())->first();
        if ($previousCart == null) {
            $cart = new Cart();
            $cart->product_id = $request->product_id;
            $cart->ip_address = $request->ip();
            $cart->color = $request->color;
            $cart->size = $request->size;
            $cart->qty = $request->qty;
            $cart->price = $request->price;
            $cart->save();
        }
        else {
            $previousCart->color = $request->color;
            $previousCart->size = $request->size;
            $previousCart->qty = $request->qty;
            $previousCart->price = $request->price;
            $previousCart->save();
        }



        if ($request->action == 'addToCart') {
            return redirect()->back();
        } else {
            return redirect('/checkout');
        }
    }
    
    public function addtoCart(Request $request, $id)
    {
         $previousCart = Cart::where('product_id', $id)->where('ip_address', $request->ip())->first();
         $product = Product::find($id);
        if ($previousCart == null) {
            $cart = new Cart();
            $cart->product_id = $id;
            $cart->ip_address = $request->ip();
            $cart->qty = 1;
            $cart->price = $product->discount_price ?? $product->regular_price;
            $cart->save();
        }
        else {
            $previousCart->qty = $previousCart->qty + 1;
            $previousCart->save();
        } 
        return redirect()->back();
    }
}
