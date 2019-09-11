<?php

  

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;
use DB;

  

class ImageUploadController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function imageUpload()

    {

        return view('imageUpload');

    }

  

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function imageUploadPost()

    {

        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

  

        $imageName = time().'.'.request()->image->getClientOriginalExtension();

  
        $destinationPath = public_path('images');
        request()->image->move($destinationPath,$imageName);

  		$store = DB::table('profile')->insert(
		         ['images' => 'images/'.$imageName]
		        );

        return back()

            ->with('success','You have successfully upload image.')

            ->with('image',$imageName);

    }

}