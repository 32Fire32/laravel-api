<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewComment;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Project;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function createComment(Project $project, Request $request){

    $request->validate([
        'name' => 'nullable|string|max:150',
        'content' =>'required|string',
    ]);
    
    $data = $request->all();

        $new_comment = new Comment();
        $new_comment->name = $data['name'];
        $new_comment->content = $data['content'];
        $new_comment->project_id = $project->id;
        $new_comment->name_project = $project->name_project;
        $new_comment->save();
        
        if($new_comment)
        {
            Mail::to('info@boolfolio.com')->send(new NewComment($new_comment));
        }

        return $new_comment;


    }
}
