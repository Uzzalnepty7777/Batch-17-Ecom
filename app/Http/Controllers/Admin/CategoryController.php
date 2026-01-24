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

        toastr()->success('Category added successfully!');
        return redirect()->back();
    }
    public function listCategory()
    {
        $categories = Category::get();
        return view ('admin.category.list', compact('categories'));
    }
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if($category->image && file_exists('admin/category/'.$category->image)){
            unlink('admin/category/'.$category->image);
        }
        $category->delete();
        toastr()->success('Category deleted successfully!');
        return redirect()->back();
        
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view ('admin.category.edit', compact('category'));
    }
    public function updateCategory(Request $request, $id)
    {

        $category = Category::find($id);
        $category->name = $request->name;

        $category->slug = Str::slug($request->name);

        if(isset($request->image)){

              if($category->image && file_exists('admin/category/'.$category->image)){
                unlink('admin/category/'.$category->image);


              }
               $imagename = rand().'-category.'.$request->image->extension();
            $request->image->move('admin/category/', $imagename);

            $category->image = $imagename;
        }
        $category->save();
        return redirect()->back();
    }     
   
}
