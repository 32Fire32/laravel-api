<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::with('type', 'technologies')->get();

        return $projects;
        // return response()->json([
        //     'success' => true,s
        //     'results' => $projects
        // ])
    }
    public function show($slug)
    {
        try {
            $project = Project::where('slug', $slug)->with('type', 'technologies', 'comments')->firstOrFail();
            return $project;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'error' => '404 project not found'
            ], 404);
        }
    }
}
