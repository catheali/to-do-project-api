<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    //
    public function getAllProjects( )
    {
        $projects = Projects::get()->toJson(JSON_PRETTY_PRINT);
        return response($projects, 200);
    }


    public function createProject(Request $request)
    {
        $project = new Projects;
        $project->title = $request->title;
        $project->content = $request->content;
        $project->status = $request->status;
        $project->due_time = $request->due_time;
        $project->user_id = $request->user_id;
        $project->save();

        return response()->json([

            "message" => "Project successfully created"
        ], 201);

    }
    public function getMyProjects($id)
    {
        if(Projects::where('user_id', $id)->exists()){
            $myprojects = Projects::where('user_id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($myprojects, 200);
        }else {
            return response()->json([
                "message" => "Projects not found"
            ],404);
        }
    }
    public function updateProject(Request $request, $id)
    {
        if(Projects::where('id', $id)->exists()){
            $project = Projects::find($id);
            $project->title = is_null($request->title) ? $project->title : $request->title;
            $project->content = is_null($request->content) ? $project->content : $request->content;
            $project->status =  is_null($request->status) ? $project->status : $request->status;
            $project->due_time =  is_null($request->due_time) ? $project->due_time : $request->due_time;
            $project->user_id = is_null($request->user_id) ? $project->user_id : $request->user_id;
            $project->save();
            return response()->json([
                "message" => "Updated success!"
            ], 200);
        } else {
            return response()->json([
                "message"=> "Project not found"
            ], 404);
        }
    }
    public function deleteProject($id)
    {
        if(Projects::where('id', $id)){
            $project = Projects::find($id);
            $project->delete();

            return response()->json([
                "message"=> "Project successfully deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Project not found"
            ], 404);
        }
    }

}