<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Image;
use Validator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = Image::all();
        return response()->json([
            "success" => "200",
            "message" => "image List :",
            "data" => $image
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
            'name' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'enable' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $file_picture = $request->image;
        $fileName_picture = $host.'/storage/image/'.time().'_'.$file_picture->getClientOriginalName();
        $file_picture->move(public_path('storage/image'), $fileName_picture);

        $image = Image::create($input);

        return response()->json([
            "success" => "200",
            "message" => "image created successfully.",
            "data" => $image
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
        $image = Image::find($id);
        if (is_null($image)) {
            return $this->sendError('image not found.');
        }
        return response()->json([
            "success" => "200",
            "message" => "image retrieved successfully.",
            "data" => $image
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
        // $image = Image::where('id', $id)->first();

        $image = Image::find($id);

        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
            'enable' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        if ($request->image != NULL) {
            $host = $request->getSchemeAndHttpHost();

            $file_picture = $request->image;
            $fileName_picture = $host.'/storage/image/'.time().'_'.$file_picture->getClientOriginalName();
            $file_picture->move(public_path('storage/image'), $fileName_picture);

            
            $image->fill($input)->save();
            $image->update([
                'file' => $fileName_picture
            ]);

            $data = [
                "success" => "200",
                "message" => "Image updated successfully.",
                'data' => $image
            ];  
            return response()->json($data, 200);
        }
        
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        if($image)
           $image->delete(); 
        else
            return response()->json(error);
        return response()->json([
            "success" => '200',
            "message" => "image deleted successfully.",
            "data" => $image
        ]);
    }
}