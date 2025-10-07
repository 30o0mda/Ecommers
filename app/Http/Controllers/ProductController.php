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
        $request->validate([
            'name' => 'required|max:10|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'image_path' => '',
            'category_id' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->image_path = $request->image_path;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect('/product');
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
            'image_path' => '',
            'category_id' => 'required',
        ]);
        $product = Product::where('id', '=', $request->pro_id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'image_path' => $request->image_path,
            'category_id' => $request->category_id,
        ]);

        return redirect('/product');
    }
    public function RemoveProduct($pro_id = null)
    {
        if ($pro_id != null) {
            Product::where('id', '=', $pro_id)->delete();
        }
        return redirect('/product');
    }



}
