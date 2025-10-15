<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductTable()
    {
        $products = Product::all();
        return view('Dashboard.products.producttable', ['products' => $products]);
    }

    public function AddProduct()
    {

        $allcategories = Category::all();
        $products = Product::all();
        return view('Dashboard.products.addproduct', ['allcategories' => $allcategories, 'products' => $products]);
    }
    public function EditProduct($pro_id = null)
    {
        if ($pro_id !== null) {
            $product = Product::where('id', '=', $pro_id)->first();
            $allcategories = Category::all();
            return view('Dashboard.products.editproduct', ['product' => $product, 'allcategories' => $allcategories]);
        } else {
            return redirect('/addproduct');
        }

    }

   public function ShowProductAdmin($pro_id)
{
    $product = Product::with('category')->findOrFail($pro_id);

    return view('Dashboard.products.showproduct', compact('product'));
}


    public function StoreProduct(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:10|unique:products',
            'name_en' => 'required|max:10|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->name_en = $request->name_en;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $path = $image->store('products', [
                'disk' => 'public',
            ]);
            $product->image_path = 'storage/' . $path;
        }
        $product->save();
        return redirect('/producttable');
    }


    public function UpdateProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|max:10',
            'name_en' => 'required|max:10',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required',
        ]);

        $product = Product::findOrFail($request->pro_id);

        $product->name = $request->name;
        $product->name_en = $request->name_en;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        if ($request->hasFile('image_path')) {
            if ($product->image_path && file_exists(public_path($product->image_path))) {
                unlink(public_path($product->image_path));
            }
            $image = $request->file('image_path');
            $path = $image->store('products', [
                'disk' => 'public',
            ]);
            $product->image_path = 'storage/' . $path;
        }
        $product->save();
        return redirect('/producttable')->with('success', 'تم تحديث المنتج بنجاح');
    }









    public function RemoveProduct($pro_id = null)
    {
        if ($pro_id != null) {
            Product::where('id', '=', $pro_id)->delete();
        }
        return redirect('/producttable');
    }




    public function AddImageToProduct($pro_id = null)
    {
        $product = Product::find($pro_id);
        $productImages = ProductImage::where('product_id', $pro_id)->get();
        return view('Dashboard.products.addimagetoproduct', ['product' => $product, 'productImages' => $productImages, 'pro_id' => $pro_id]);
    }
    public function StoreProductImage(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $productImage = new ProductImage();
        $productImage->product_id = $request->product_id;

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $path = $image->store('product_images', [
                'disk' => 'public',
            ]);
            $productImage->image_path = 'storage/' . $path;
        }

        $productImage->save();
        return redirect()->back()->with('success', 'Image added to product successfully.');
    }
    public function RemoveProductImage($img_id = null)
    {
        if ($img_id != null) {
            $image = ProductImage::find($img_id);
            if ($image) {
                if ($image->image_path && file_exists(public_path($image->image_path))) {
                    unlink(public_path($image->image_path));
                }
                $image->delete();
            }
        }
        return redirect()->back();
    }
}
