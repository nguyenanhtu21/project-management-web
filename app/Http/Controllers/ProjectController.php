<?php

namespace App\Http\Controllers;
use App\Services\CompanyService;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    private $projectService;
    private $companyService;

    public function __construct(ProjectService $projectService, CompanyService $companyService){
        $this->companyService = $companyService;
        $this->projectService = $projectService;
    }

    public function index(){
        $projects = $this->projectService->getAll();
        return view("project.index",["projects"=> $projects]);
    }

    public function create(){
        $companies = $this->companyService->getAll();
        return view("project.create_project", ["companies"=> $companies]);
    }

    public function store(Request $request){
        $project = new Project();
        $this->projectService->create($request->all());
        return redirect('/dashboard/project');
    }

    public function edit($id){
        $project = $this->projectService->getById($id);
        $companies = $this->companyService->getAll();
        return view('project.edit', ['project'=> $project, 'companies'=>$companies]);
    }

    public function update(Request $request, $id){
        $this->projectService->update($request->all(), $id);
        return redirect('/dashboard/project');
    }

    public function destroy($id){
        $this->projectService->delete($id);
        return redirect()->back();
    }
}
