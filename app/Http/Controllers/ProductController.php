<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Products($cat_id = null)
    {
        if ($cat_id == null) {
            $result = Product::paginate(9);
        } else {
            $result = Product::where('category_id', '=', $cat_id)->paginate(9);
        }
        return view('product', ['products' => $result]);
    }

    public function ShowProduct($pro_id)
    {
        if ($pro_id) {
            $product = Product::with('category', 'images')->find($pro_id);
            $relatedProducts = Product::where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->inRandomOrder()
                ->take(3)
                ->get();
            if ($product) {
                $category = $product->category;
                return view('products.show', [
                    'product' => $product,
                    'category' => $category,
                    'relatedProducts' => $relatedProducts,
                ]);
            } else {
                return redirect('/product')->with('error', 'Product not found.');
            }
        } else {
            return redirect('/product')->with('error', 'Product ID is required.');
        }
    }
    public function SearchProduct(Request $request)
    {
        $search = $request->input('search');
        $result = Product::where('name', 'LIKE', '%' . $search . '%')->paginate(10);
        if ($result->isEmpty()) {
            return redirect()->route('product')->with('error', 'No products found matching your search criteria.');
        } else {
            // dd($result);
            return view('product', ['products' => $result]);
        }
    }




}
