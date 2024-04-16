<?php

namespace App\Http\Controllers;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $companyService;
    public function __construct(CompanyService $companyService){
        $this->companyService = $companyService;
    }

    public function index(){
        $companies = $this->companyService->getAll();
        return view('company.index', ['companies'=> $companies]);
    }

    public function create(){
        return view('company.create_company');
    }

    public function store(Request $request){
        $error = $this->companyService->create($request->all());
        if($error){
            return redirect()->back()->with('error', $error);
        }
        return redirect('/dashboard/company');
    }

    public function edit($id){
        $company = $this->companyService->findById($id);
        return view('company.edit', ['company'=> $company]);
    }

    public function update(Request $request, $id){
        $this->companyService->update($request->all(), $id);
        return redirect('/dashboard/company');
    }

    public function destroy($id){
        $this->companyService->delete($id);
        return redirect()->back();
    }

    public function addDepartment(Request $request,$id){
        $department = $request->all();
        if(!isset($department['parent_id'])){
            $department['parent_id'] = null;
        }
        $this->companyService->addDepartment($request->all(),$id);
        return redirect()->back();
    }
}
