<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function createComment($id, Request $request){

    try{
            $name = $request->input('name');
            $content = $request->input('content');

            // Store the post in the database using Eloquent ORM
            $new_comment = new Comment;
            $new_comment->name = $name;
            $new_comment->content = $content;
            $new_comment->project_id = $id;
            $new_comment->save();

    return $content;

        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'error' => '404 comment not found'
            ], 404);
        }
    

    }
}
