<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewCommentRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(NewCommentRequest $request , Post $post)
    {
        $validator = $request->validated();

        $post->comments()->create([
            'user_id' => Auth::user()->id,
            'content' => $validator['content'],
        ]);

        return back()->with('successAlert' , 'Your comment has been successfully registered');
    }

    public function newReply(NewCommentRequest $request , Post $post , $commentId)
    {
        $validator = $request->validated();

        $post->comments()->create([
            'user_id' => Auth::user()->id,
            'parent_id' => $commentId,
            'content' => $validator['content'],
        ]);

        return back()->with('successAlert' , 'Your reply has been successfully registered');
    }
}
