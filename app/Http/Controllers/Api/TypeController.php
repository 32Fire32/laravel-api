<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index(){
        return Type::has('projects')->with('projects')->get();
    }

    public function show($slug){
        try{
            return Type::where('slug', $slug)->with('projects.technologies')->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'error' => '404 Type not found'
            ], 404);
        }
    }
}
