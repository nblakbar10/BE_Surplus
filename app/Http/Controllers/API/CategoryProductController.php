<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            'product_id' => 'required',
            'category_id' => 'required',
            'enable' => 'required',
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
    public function show($id)
    {
        $categoryproduct = CategoryProduct::find($id);
        if (is_null($categoryproduct)) {
            return $this->sendError('categoryproduct not found.');
        }
        return response()->json([
            "success" => "200",
            "message" => "categoryproduct retrieved successfully.",
            "data" => $categoryproduct
        ]);
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
    public function update(Request $request, $id)
    {
        $categoryproduct = CategoryProduct::find($id);

        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
            'enable' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $categoryproduct->name = $input['name'];
        $categoryproduct->description = $input['description'];
        $categoryproduct->save();

        return response()->json([
            "success" => "200",
            "message" => "categoryproduct updated successfully.",
            "data" => $categoryproduct
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryproduct = CategoryProduct::findOrFail($id);
        if($categoryproduct)
           $categoryproduct->delete(); 
        else
            return response()->json(error);
        return response()->json([
            "success" => "200",
            "message" => "categoryproduct deleted successfully.",
            "data" => $categoryproduct
        ]);
    }
}


