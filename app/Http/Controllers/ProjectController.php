<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponse;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::get();
        return ApiResponse::success($projects, "All Projects");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate(
          [
              'name'=>['required', 'min:5','max:128',],
              'description'=>['nullable',],
          ]  ,
        );

        $project = new Project();
        // BAD PRACTICE! Make sure you VALIDATE!
        $project->name = $request->name;
        $project->description = $request->description;
        $project->save();

        return ApiResponse::success($project, "Created", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        return ApiResponse::success($project, "Found");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
          [
              'name'=>['required', 'min:5','max:128',],
              'description'=>['nullable',],
          ]  ,
        );

        $project = Project::find($id);
        // BAD PRACTICE! Make sure you VALIDATE!

        $project->name = $validated['name'];
        $project->description = $validated['description'];
        $project->save();

        return ApiResponse::success($project, "Updated", 201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        $result = Project::destroy($id);

        return ApiResponse::success($project, "Deleted", 200);
    }
}
