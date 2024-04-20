<?php

namespace App\Repositories;
use App\Models\Project;

class ProjectRepository{

    public function getAll(){
        $projects = Project::all();
        return $projects;
    }

    public function getById($id){
        $project = Project::find($id);
        return $project;
    }

    public function save(Project $project){
        $project->save();
    }

    public function delete($id){
        $project = Project::find($id);
        $project->delete();
    }
}