<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
            $data['about'] = Product::orderBy('created_at', 'desc')->get();
            
            return view('dashboard', $data);
            
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $image = $request->file('image');
            $file = new Product();

            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product'), $imageName);
            $file->create([
                'image' => $imageName,
                'name' => $request['name'],
                'desc' => $request['description'],
                'price' => $request['price'],
                'qty' => $request['qty'],
            ]);
            return redirect()->back()->withSuccess_message('Product Added Successfully !');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $why = Product::find($id);
            $path = $why['image'];
            if (file_exists($path)){
                unlink($path);
            }
            $why->delete();
            return redirect()->back()->withWarning_message('About Us Content Deleted !');

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateProductStatus(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->ready = !$product->ready;
        $product->save();

        return redirect()->back();
    }
}
