<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import the Validator facade
use App\Models\Post;

class DashboardController extends Controller
{
    //

    public function index(){
        return view('form');
    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }
    
        $data = new Post;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->author = $request->author;
    
        $data->save();
    
        return response()->json(['success' => true]);
    }
    
    
}
