<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $posts = Post::with('comments')->get();
            return response()->json(['status_code' => 200, 'status_msg' => 'OK', 'data' => $posts]);
        } catch (\Exception $e) {
            return response()->json(['status_code' => 999, 'status_msg' => $e->getMessage()]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Post::create($request->only('title', 'content'));
            return response()->json(['status_code' => 200, 'status_msg' => 'OK']);
        } catch (\Exception $e) {
            return response()->json(['status_code' => 999, 'status_msg' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $post = Post::find($id);
            return response()->json(['status_code' => 200, 'status_msg' => 'OK', 'data' => $post]);
        } catch (\Exception $e) {
            return response()->json(['status_code' => 999, 'status_msg' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $post = Post::where('id', $id)->update($request->only('title', 'content'));
            return response()->json(['status_code' => 200, 'status_msg' => 'OK', 'data' => $post]);
        } catch (\Exception $e) {
            return response()->json(['status_code' => 999, 'status_msg' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $post = Post::where('id',$id)->delete();
            return response()->json(['status_code' => 200, 'status_msg' => 'OK', 'data' => $post]);
        } catch (\Exception $e) {
            return response()->json(['status_code' => 999, 'status_msg' => $e->getMessage()]);
        }
    }
}
