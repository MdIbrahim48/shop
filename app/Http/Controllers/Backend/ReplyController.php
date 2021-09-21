<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Reply;
use App\Models\Comment;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function replies($id){
        $comment = Comment::findOrFail($id)->first();
        return view('backend.reply.add_reply',[
            'comment' =>$comment
        ]);
    }
    public function index()
    {
        // $replies = Reply::get();
        // return view('backend.reply.list_reply',[
        //     'replies' => $replies
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //$reply = Comment::findOrFail();
       // return view('backend.reply.add_reply');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'comment' => "required"
        ]);
        $reply = new Reply;
        $reply->comment = $request->comment;
        $reply->save();
        Session()->flash('alert-success','Reply Added Successfully');
        return redirect()->route('replies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reply = Reply::findOrFail($id);
        return view('backend.reply.edit_reply',[
            'reply' => $reply
        ]);
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
        $reply = Reply::findOrFail($id);
        $reply->comment = $request->comment;
        $reply->update();
        Session()->flash('alert-success','Reply Update Successfully');
        return redirect()->route('replies.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reply::findOrFail($id)->delete();
        Session()->flash('alert-success','Reply Delete Successfully');
        return redirect()->route('replies.index');
    }
}
