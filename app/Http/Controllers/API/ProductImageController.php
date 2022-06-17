<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\ProductImage;
use Illuminate\Support\Facades\Validator;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productimage = ProductImage::all();
        return response()->json([
            "success" => "200",
            "message" => "ProductImage List :",
            "data" => $productimage
        ]);
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
        $input = $request->all();
        $validator = Validator::make($input, [
            'product_id' => 'required|integer',
            'image_id' => 'required|integer',
            // 'enable' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(), 400);        
        }
        
        $productimage = ProductImage::create($input);
        return response()->json([
            "success" => "200",
            "message" => "productimage created successfully.",
            "data" => $productimage
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showbyProductID($product_id)
    {
        $productimage = ProductImage::where('product_id', $product_id)->get();

        if (count($productimage)==0) {
            $data = [
                'message' => 'productid not found'
            ];

            return response()->json($data, 200);
        }

        $array = [];
        foreach ($productimage as $key => $value) {
            array_push($array, $value);
        }
        $data = [
            'message' => 'Success',
            'data' => $array
        ];     

        return response()->json($data, 200);
    }

    public function showbyImageID($image_id)
    {
        $productimage = ProductImage::where('image_id', $image_id)->get();

        if (count($productimage)==0) {
            $data = [
                'message' => 'productimage not found'
            ];

            return response()->json($data, 200);
        }

        $array = [];
        foreach ($productimage as $key => $value) {
            array_push($array, $value);
        }
        $data = [
            'message' => 'Success',
            'data' => $array
        ];     

        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatebyImageID(Request $request, $image_id)
    {
        $productimage = ProductImage::where('image_id', $image_id);

        $productimage->update([
            'product_id' => $request->input('product_id')
        ]);

        return response()->json([
            "success" => "200",
            "message" => "imageproduct updated successfully."
        ]);
    }

    public function updatebyProductID(Request $request, $product_id)
    {

        $productimage = ProductImage::where('product_id', $product_id);
        $productimage->update([
            'image_id' => $request->input('image_id')
        ]);

        return response()->json([
            "success" => "200",
            "message" => "productimage updated successfully."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroybyImageID($image_id)
    {
        $count = ProductImage::where('image_id', $image_id)->delete();
        if($count > 0 ){

            return response()->json(['message'=>'Successfully Deleted']);
        }
        else{
            return response()->json(['message'=>'Delete Failed']);
        }
    }

    public function destroybyProductID($product_id)
    {
        $count = ProductImage::where('product_id', $product_id)->delete();
        if($count > 0 ){

            return response()->json(['message'=>'Successfully Deleted']);
        }
        else{
            return response()->json(['message'=>'Delete Failed']);
        }
    }
}