<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = Product::with('category', 'brand', 'business.user', 'item', 'productType')->get();
            return view('backend.products.index', compact('products'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $categories = Category::all();
            $product_types = ProductType::all();
            $items = Item::all();
            $brands = Brand::all();
            return view('backend.products.create', compact('categories', 'product_types', 'items', 'brands'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Product $product)
    {
        try {
            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->category_id = $request->category_id;
            $product->item_id = $request->item_id;
            $product->brand_id = $request->brand_id;
            $product->business_id = 1;
            $product->product_type_id = $request->product_type_id;
            $this->save_image($request, 'image', $product, 'products', 300, 300);
            $product->save();
            return redirect()->route('products.index')->with('success', 'Product created successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        try {
            $categories = Category::all();
            $product_types = ProductType::all();
            $items = Item::all();
            $brands = Brand::all();
            return view('backend.products.edit', compact('product', 'categories', 'product_types', 'brands', 'items'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        try {
            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->category_id = $request->category_id;
            $product->item_id = $request->item_id;
            $product->brand_id = $request->brand_id;
            $product->business_id = 1;
            $product->product_type_id = $request->product_type_id;
            $this->update_image($request, 'image', $product, 'products', 300, 300);
            $product->save();
            return redirect()->route('products.index')->with('success', 'Product created successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $this->delete_image($product, 'products', 'image');
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Product deleted successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function delete_image($obj, $image_path, $image_name)
    {
        try {
            $image = public_path('/images/' . $image_path . '/' . $obj->$image_name);
            if (File::exists($image)) {
                File::delete($image);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function save_image($request, $image, $obj, $image_path, $width = 300, $height = 300)
    {
        try {
            if ($request->hasFile($image)) {
                $file = $request->file($image);
                $filename = time() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize($width, $height)->save(public_path('/images/' . $image_path . '/' . $filename));
                $obj->$image = $filename;

                $obj->save();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update_image($request, $image, $obj, $image_path, $width = 300, $height = 300)
    {
        try {
            if ($check = $request->hasFile($image)) {
                $this->delete_image($obj, $image_path, $image);
                $file = $request->file($image);
                $filename = time() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize($width, $height)->save(public_path('/images/' . $image_path . '/' . $filename));
                $obj->$image = $filename;
                $obj->save();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
