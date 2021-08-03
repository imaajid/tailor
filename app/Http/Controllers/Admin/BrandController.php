<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $brands = Brand::all();
            return view('backend.brands.index', compact('brands'));
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
            return view('backend.brands.create');
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
    public function store(Request $request, Brand $brand)
    {
        try {
            $brand->name = $request->name;
            $this->save_image($request, 'image', $brand, 'brands', 300, 300);
            $brand->save();
            return redirect()->route('brands.index')->with('success', 'Brand added successfully');
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
    public function edit(Brand $brand)
    {
        try {
            return view('backend.brands.edit', compact('brand'));
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
    public function update(Request $request, Brand $brand)
    {
        try {
            $brand->name = $request->name;
            $this->update_image($request, 'image', $brand, 'brands', 300, 300);
            $brand->save();
            return redirect()->route('brands.index')->with('success', 'Brand updated successfully');
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
    public function destroy(Brand $brand)
    {
        try {
            $this->delete_image($brand, 'brands', 'image');
            $brand->delete();
            return redirect()->route('brands.index')->with('success', 'Brand deleted successfully');
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
