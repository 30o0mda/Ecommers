<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryTable()
    {
        $categories = Category::query()->get();
        return view('Dashboard.categories.categorytable', ['categories' => $categories]);
    }

    public function AddCategory()
    {
        $categories = Category::all();
        return view('Dashboard.categories.addcategory', ['categories' => $categories]);
    }

    public function EditCategory($cat_id = null)
    {
        if ($cat_id !== null) {
            $category = Category::where('id', '=', $cat_id)->first();
            return view('Dashboard.categories.editcategory', ['category' => $category]);
        } else {
            return redirect('/addcategory');
        }

    }
    public function ShowCategory($cat_id)
{
    $category = Category::findOrFail($cat_id);
    return view('Dashboard.categories.showcategory', compact('category'));
}


    public function StoreCategory(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:10|unique:categories',
            'name_en' => 'required|max:10|unique:categories',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->name_en = $request->name_en;
        $category->description = $request->description;
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $path = $image->store('categories', ['disk' => 'public']);
            $category->image_path =  'storage/' . $path;
        }
        $category->save();
        return redirect('/categorytable');
    }

    public function UpdateCategory(Request $request , $cat_id)
    {
        // dd($request->all());
        // Validate the request
        $request->validate([
            'name' => 'required|max:10|unique:categories,name,' . $cat_id,
            'name_en' => 'required|max:10|unique:categories,name_en,' . $cat_id,
            'description' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $category = Category::findOrFail($cat_id);
        $category->name = $request->name;
        $category->name_en = $request->name_en;
        $category->description = $request->description;
        if ($request->hasFile('image_path')) {
            if ($category->image_path && file_exists(public_path($category->image_path))) {
                unlink(public_path($category->image_path));
            }
            $image = $request->file('image_path');
            $path = $image->store('categories', ['disk' => 'public']);
            $category->image_path = 'storage/' . $path;
        }
        $category->save();
        return redirect('/categorytable')->with('success', 'Category updated successfully.');
    }


    public function RemoveCategory($cat_id = null)
    {
        if ($cat_id != null) {
            // Check if there are products associated with the category
            $productCount = Product::where('category_id', $cat_id)->count();
            if ($productCount > 0) {
                // If there are products, do not delete the category and return an error message
                return redirect('/categorytable')->with('error', 'Cannot delete category with associated products.');
            }

            Category::where('id', '=', $cat_id)->delete();
        }
        return redirect('/categorytable');
    }
}
