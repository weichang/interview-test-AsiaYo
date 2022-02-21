<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $comments = Comment::all();
            return response()->json(['status_code' => 200, 'status_msg' => 'OK', 'data' => $comments]);
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
            Comment::create($request->only('post_id', 'messages'));
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
            $comment = Comment::find($id);
            return response()->json(['status_code' => 200, 'status_msg' => 'OK', 'data' => $comment]);
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
            $comment = Comment::where('id', $id)->update($request->only('messages'));
            return response()->json(['status_code' => 200, 'status_msg' => 'OK', 'data' => $comment]);
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
            $comment = Comment::where('id',$id)->delete();
            return response()->json(['status_code' => 200, 'status_msg' => 'OK', 'data' => $comment]);
        } catch (\Exception $e) {
            return response()->json(['status_code' => 999, 'status_msg' => $e->getMessage()]);
        }
    }
}
