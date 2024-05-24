<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\ChatRoom;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function sendMessage(Request $request)
    {
        $comment = new Comment([
            "text" => $request->text,
            "status" => "pending",
            "user_id" => Auth::id(),
            "room_id" => $request->roomId,
            "parent_id" => $request->parent_id,
        ]);
 
        $post = ChatRoom::find($request->roomId);
        
        $post->messages()->save($comment);

        MessageSent::dispatch($comment);

        return Redirect::back()->with(['status' => true, 'message' => "Message sent"]);
    }
}
