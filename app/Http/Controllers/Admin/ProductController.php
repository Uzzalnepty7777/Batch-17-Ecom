<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function createProduct()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $subcategories = SubCategory::orderBy('name', 'asc')->get();

        return view('admin.product.create', compact('categories', 'subcategories'));
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


        if (isset($request->image)) {
            $imagename = rand() . '-mainimage.' . $request->image->extension();
            $request->image->move('admin/product/', $imagename);
            $product->image = $imagename;
        }

        $product->save();

        // Gallery Image Upload

        if (isset($request->gallery_image)) {

            foreach ($request->gallery_image as $galleryimage) {

                $galleryimageObject = new GalleryImage();

                $galleryimagename = rand() . '-galleryimage.' . $galleryimage->extension();
                $galleryimage->move('admin/galleryimage/', $galleryimagename);
                $galleryimageObject->gallery_image = $galleryimagename;
                $galleryimageObject->product_id = $product->id;
                $galleryimageObject->save();
            }
        }
        // Color Upload
        if (isset($request->color)  && $request->color[0] != null) {
            foreach ($request->color as $color_name) {
                if ($color_name != null)
                    $color = new Color();

                $color->name = $color_name;
                $color->slug = Str::slug($color_name);
                $color->product_id = $product->id;

                $color->save();
            }
        }
        // Size Upload
        if (isset($request->size)  && $request->size[0] != null) {
            foreach ($request->size as $size_name) {
                if ($size_name != null)
                    $size = new Size();

                $size->name = $size_name;
                $size->slug = Str::slug($size_name);
                $size->product_id = $product->id;

                $size->save();
            }
        }
        return redirect()->back()->with('success', 'Product updated successfully!');
    }
    public function listProduct()
    {
        $products = Product::with('category', 'subcategory')->paginate(50);
        return view('admin.product.list', compact('products'));
    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);

        $product = Product::find($id);
        if ($product->image && file_exists('admin/product/' . $product->image)) {
            unlink('admin/product/' . $product->image);
        }
        //  Delete Gallery Images...
        $galleryImages = GalleryImage::where('product_id', $product->id)->get();
        foreach ($galleryImages as $galleryImage) {

            if ($galleryImage->gallery_image && file_exists('admin/galleryimage/' . $galleryImage->gallery_image)) {
                unlink('admin/galleryimage/' . $galleryImage->gallery_image);
            }
            $galleryImage->delete();
        }
        //  Delete Colors...
        $colors = Color::where('product_id', $product->id)->get();
        foreach ($colors as $color) {
            $color->delete();
        }
        // Delete Sizes...
        $sizes = Size::where('product_id', $product->id)->get();
        foreach ($sizes as $size) {
            $size->delete();
        }
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
    public function editProduct($id)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $subcategories = SubCategory::orderBy('name', 'asc')->get();
        $product = Product::find($id);
        $colors = Color::where('product_id', $product->id)->get();
        $sizes = Size::where('product_id', $product->id)->get();
        $galleryImages = GalleryImage::where('product_id', $product->id)->get();
        return view('admin.product.edit', compact('categories', 'subcategories', 'product', 'colors', 'sizes', 'galleryImages'));
    }
    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);

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

        if (isset($request->image)) {
            $product = Product::find($id);
            if ($product->image && file_exists('admin/product/' . $product->image)) {
                unlink('admin/product/' . $product->image);
            }
            $imagename = rand() . '-mainimage.' . $request->image->extension();
            $request->image->move('admin/product/', $imagename);
            $product->image = $imagename;
        }
        $product->save();

        // Update colors....
        if (isset($request->color)  && ($request->color[0] != null || $request->color[1] != null)) {
            // First delete existing colors
            Color::where('product_id', $product->id)->delete();

            // Then add new colors
            foreach ($request->color as $color_name) {
                if ($color_name != null) {
                    $color = new Color();
                    $color->name = $color_name;
                    $color->slug = Str::slug($color_name);
                    $color->product_id = $product->id;
                    $color->save();
                }
            }
        }
        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    // Color, Size, Gallery Image Delete.....
    public function deleteColor($id)
    {
        $color = Color::find($id);
        $color->delete();
        return redirect()->back();
    }
    if (isset($request->color)  && ($request->color[0] != null || $request->color[1] != null)) {
            // First delete existing colors
            Color::where('product_id', $product->id)->delete();
            // Then add new colors
            foreach ($request->color as $color_name) {
                if ($color_name != null) {
                    $color = new Color();
                    $color->name = $color_name;
                    $color->slug = Str::slug($color_name);
                    $color->product_id = $product->id;
                    $color->save();

    
}
