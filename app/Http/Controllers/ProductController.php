<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Products($cat_id = null)
    {
        if ($cat_id == null) {
            $result = Product::get();
        } else {
            $result = Product::where('category_id', '=', $cat_id)->get();
        }
        return view('product', ['products' => $result]);
    }

    public function AddProduct()
    {
        $allcategories = Category::all();
        return view('products.addproduct', ['allcategories' => $allcategories]);
    }

    public function StoreProduct(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:10|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $path = $image->store('products', );
            $product->image_path = 'storage/' . $path;
        }
        $product->save();
        return redirect('/product');
    }

    // public function ShowProduct(Request $request)
    // {
    //     $pro_id = $request->input('pro_id');
    //     if ($pro_id) {
    //         $product = Product::find($pro_id);
    //         if ($product) {
    //             return view('products.showproduct', ['product' => $product]);
    //         } else {
    //             return redirect('/product')->with('error', 'Product not found.');
    //         }
    //     } else {
    //         return redirect('/product')->with('error', 'Product ID is required.');
    //     }
    // }
    public function ShowProduct($pro_id)
    {
        if ($pro_id) {
            $product = Product::find($pro_id);
            if ($product) {
                $category = $product->category;
                 // assuming relation exists
                return view('products.showproduct', [
                    'product' => $product,
                    'category' => $category
                ]);
            } else {
                return redirect('/product')->with('error', 'Product not found.');
            }
        } else {
            return redirect('/product')->with('error', 'Product ID is required.');
        }
    }


    public function EditProduct($pro_id = null)
    {
        if ($pro_id !== null) {
            $product = Product::where('id', '=', $pro_id)->first();
            $allcategories = Category::all();
            return view('products.editproduct', ['product' => $product, 'allcategories' => $allcategories]);
        } else {
            return redirect('/addproduct');
        }

    }

    public function UpdateProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|max:10',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required',
        ]);

        $product = Product::findOrFail($request->pro_id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        if ($request->hasFile('image_path')) {
            if ($product->image_path && file_exists(public_path($product->image_path))) {
                unlink(public_path($product->image_path));
            }
            $image = $request->file('image_path');
            $path = $image->store('products', 'public');
            $product->image_path = 'storage/' . $path;
        }
        $product->save();
        return redirect('/product')->with('success', 'تم تحديث المنتج بنجاح');
    }

    public function SearchProduct(Request $request)
    {
        $search = $request->input('search');
        $result = Product::where('name', 'LIKE', '%' . $search . '%')->get();
        // dd($result);
        if ($result->isEmpty()) {
            return redirect()->route('product')->with('error', 'No products found matching your search criteria.');
        } else {
            // dd($result);
            return view('product', ['products' => $result]);
        }
    }


    public function RemoveProduct($pro_id = null)
    {
        if ($pro_id != null) {
            Product::where('id', '=', $pro_id)->delete();
        }
        return redirect('/product');
    }



}
