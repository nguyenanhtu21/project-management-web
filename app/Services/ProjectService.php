<?php

namespace App\Services;
use App\Models\Project;
use App\Repositories\ProjectRepository;

class ProjectService{
    private $projectRepository;
    public function __construct(ProjectRepository $projectRepository){
        $this->projectRepository = $projectRepository;
    }

    public function getAll(){
        $projects = $this->projectRepository->getAll();
        return $projects;
    }

    public function getById($id){
        $project = $this->projectRepository->getById($id);
        return $project;
    }

    public function create(array $projectData){
        $project = new Project();
        $project->code = $projectData["code"];
        $project->name = $projectData["name"];
        $project->description = $projectData["description"];
        $project->company_id = $projectData["company_id"];

        $this->projectRepository->save($project);
        
        $project->persons()->attach($projectData["person_id"]);
    }

    public function update(array $projectData, $id){
        $project = $this->projectRepository->getById($id);
        $project->code = $projectData["code"];
        $project->name = $projectData["name"];
        $project->description = $projectData["description"];
        $project->company_id = $projectData["company_id"];
        $this->projectRepository->save($project);

        $project->persons()->sync($projectData["person_id"]);
    }

    public function delete($id){
        $this->projectRepository->delete($id);
    }
}