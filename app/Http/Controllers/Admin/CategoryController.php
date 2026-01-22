<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function createCategory()
    {
        return view('admin.category.create');
    }

    public function storeCategory(Request $request)
    {
        $category = new Category();

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        if(isset($request->image)){
            $imagename = rand().'-category.'.$request->image->extension();
            $request->image->move('admin/category/', $imagename);
            $category->image = $imagename;
            
        }
        $category->save();
        return redirect()->back();
    }

    
}
