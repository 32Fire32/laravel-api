<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Queue\Events\JobRetryRequested;

class CommentController extends Controller
{
    public function index(){
        return view('comment');
    }

    public function destroy(Comment $comment)
    {
        $project = $comment->project;
        $comment->delete();

        return redirect()->route('admin.projects.show', $project);
    }
}
