<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function createProduct()
    {
        $categories = Category::orderBy('name','asc')->get();
        $subcategories = SubCategory::orderBy('name','asc')->get();

        return view('admin.product.create', compact ('categories', 'subcategories')); 
    }
    public function storeProduct(Request $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->cat_id = $request->cat_id;
        $product->sku_code = $request->sku_code;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->buying_price = $request->buying_price;
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->discount_price;
        $product->qty = $request->qty;
        $product->product_type = $request->product_type;
        $product->description = $request->description;
        $product->product_policy = $request->product_policy;


        if(isset($request->image)){
            $imagename = rand().'-mainimage.'.$request->image->extension();
            $request->image->move('admin/product/', $imagename);
            $product->image = $imagename;
        }

        $product->save();
        toastr()->success('Product added successfully!');
        return redirect()->back();

    }
   

}
