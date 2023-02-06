<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Project;

class CommentController extends Controller
{
    public function createComment(Project $project, Request $request){

    $request->validate([
        'name' => 'nullable|string|max:150',
        'content' =>'required|string'
    ]);
    
    $data = $request->all();

        $new_comment = new Comment();
        $new_comment->name = $data['name'];
        $new_comment->content = $data['content'];
        $new_comment->project_id = $project->id;
        $new_comment->save();

        return $new_comment;



    }
}
