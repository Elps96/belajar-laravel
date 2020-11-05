<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = \App\Blog::all();
 
        return $blogs->toJson();
    }
 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'title' => 'required',
          'content' => 'required',
        ]);
 
        $project = \App\Blog::create([
          'title' => $validatedData['title'],
          'content' => $validatedData['content'],
        ]);
 
        $msg = [
            'success' => true,
            'message' => 'Blog created successfully!'
        ];
 
        return response()->json($msg);
    }
 
    public function getBlog($id) // for edit and show
    {
        $blog = \App\Blog::find($id);
 
        return $blog->toJson();
    }
 
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
          'title' => 'required',
          'content' => 'required',
        ]);
 
        $blog = \App\Blog::find($id);
        $blog->title = $validatedData['title'];
        $blog->content = $validatedData['content'];
        $blog->save();
 
        $msg = [
            'success' => true,
            'message' => 'Blog updated successfully'
        ];
 
        return response()->json($msg);
    }
 
    public function delete($id)
    {
        $blog = \App\Blog::find($id);
        if(!empty($blog)){
            $blog->delete();
            $msg = [
                'success' => true,
                'message' => 'Blog deleted successfully!'
            ];
            return response()->json($msg);
        } else {
            $msg = [
                'success' => false,
                'message' => 'Blog deleted failed!'
            ];
            return response()->json($msg);
        }
    }
}
