<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Product;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
            $data['about'] = Info::orderBy('created_at', 'desc')->get();
            
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
           
           
            $file = new Info();

            $file->create([
                
                'name' => $request['name'],
                'gender' => $request['gender'],
                'phone' => $request['phone'],
                'email' => $request['email'],
               'dob' => $request['dob'],
                 'nationality' => $request['nationality'],
                 'mode_of_contact' => $request['mode'],

            ]);
            return redirect()->back()->withSuccess_message('Information Added Successfully !');
        } catch (\Exception $e) {
            return $e->getMessage();
        }



        /*
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
        }*/
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
    public function edit($id)
    {
        $pro = Product::findorFail($id);
        
        return view('product.edit')->with('pro',$pro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            if($request->hasFile('image'))
            {
            $image = $request->file('image');
           

            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $file = Product::findorFail($id);
            $file->update([
                'image' => $imageName]);
            $image->move(public_path('product'), $imageName);
            }

            $file = Product::findorFail($id);
            $file->update([
                
                'name' => $request['name'],
                'desc' => $request['desc'],
                'price' => $request['price'],
                'qty' => $request['qty'],
            ]);
            return redirect()->back()->withSuccess_message('Product Added Successfully !');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
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
    public function editf(Request $request,$id)
    {
        try{
        $file = New Education();
        $file->create([
                
            'info_id' => $id,
            'educational_inst' => $request['educational_inst'],
            'level' => $request['level'],
            'percentage' => $request['percentage'],

        ]);

        return redirect()->back()->withSuccess_message('Education Added Successfully !');
    } catch (\Exception $e) {
        return $e->getMessage();
    }
    }
}
