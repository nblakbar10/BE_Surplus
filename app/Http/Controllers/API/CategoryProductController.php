<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Validator;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryproduct = CategoryProduct::all();
        return response()->json([
            "success" => "200",
            "message" => "categoryproduct List :",
            "data" => $categoryproduct
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
            'category_id' => 'required|integer',
            // 'enable' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(), 400);        
        }
        
        $categoryproduct = CategoryProduct::create($input);
        return response()->json([
            "success" => "200",
            "message" => "categoryproduct created successfully.",
            "data" => $categoryproduct
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
        $categoryproduct = CategoryProduct::where('product_id', $product_id)->get();

        if (count($categoryproduct)==0) {
            $data = [
                'message' => 'productid not found'
            ];

            return response()->json($data, 200);
        }

        $array = [];
        foreach ($categoryproduct as $key => $value) {
            array_push($array, $value);
        }
        $data = [
            'message' => 'Success',
            'data' => $array
        ];     

        return response()->json($data, 200);
    }

    public function showbyCategoryID($category_id)
    {
        $categoryproduct = CategoryProduct::where('category_id', $category_id)->get();

        if (count($categoryproduct)==0) {
            $data = [
                'message' => 'categoryproduct not found'
            ];

            return response()->json($data, 200);
        }

        $array = [];
        foreach ($categoryproduct as $key => $value) {
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
    public function updatebyCategoryID(Request $request, $category_id)
    {
        $categoryproduct = CategoryProduct::where('category_id', $category_id);

        $categoryproduct->update([
            'product_id' => $request->input('product_id')
        ]);

        return response()->json([
            "success" => "200",
            "message" => "categoryproduct updated successfully."
        ]);
    }

    public function updatebyProductID(Request $request, $product_id)
    {

        $categoryproduct = CategoryProduct::where('product_id', $product_id);
        $categoryproduct->update([
            'category_id' => $request->input('category_id')
        ]);

        return response()->json([
            "success" => "200",
            "message" => "categoryproduct updated successfully."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroybyCategoryID($category_id)
    {
        $count = CategoryProduct::where('category_id', $category_id)->delete();
        if($count > 0 ){

            return response()->json(['message'=>'Successfully Deleted']);
        }
        else{
            return response()->json(['message'=>'Delete Failed']);
        }
    }

    public function destroybyProductID($product_id)
    {
        $count = CategoryProduct::where('product_id', $product_id)->delete();
        if($count > 0 ){

            return response()->json(['message'=>'Successfully Deleted']);
        }
        else{
            return response()->json(['message'=>'Delete Failed']);
        }
    }
}


