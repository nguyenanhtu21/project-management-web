<?php

namespace App\Services;
use App\Models\Department;
use App\Repositories\CompanyRepository;
use App\Models\Company;
use App\Repositories\DepartmentRepository;

class CompanyService{
    private $companyRepository;
    private $departmentRepository;
    public function __construct(CompanyRepository $companyRepository, DepartmentRepository $departmentRepository){
        $this->companyRepository = $companyRepository;
        $this->departmentRepository = $departmentRepository;
    }

    public function getAll(){
        return $this->companyRepository->getAll();
    }

    public function create(array $data){
        if($this->companyRepository->existsByCode($data['code'])){
            $error = 'Mã công ty đã tồn tại';
            return $error;
        }
        $company = new Company();
        $company->code = $data['code'];
        $company->name = $data['name'];
        $company->address = $data['address'];
        $this->companyRepository->save($company);
    }

    public function update(array $data, $id){
        $company = $this->companyRepository->findById($id);
        $company->name = $data['name'];
        $company->code = $data['code'];
        $company->address = $data['address'];
        $this->companyRepository->save($company);
    }

    public function addDepartment(array $data, $id){
        $company = $this->companyRepository->findById($id);
        $department = new Department();
        $department->code = $data['code'];
        $department->name = $data['name'];
        if(isset($data['parent_id'])){
            $department->parent_id = $data['parent_id'];
        }else{
            $department->parent_id = null;
        }
        $department->company_id = $company->id;
        $this->departmentRepository->save($department);
    }

    public function delete($id){
        $this->companyRepository->delete($id);
    }

    public function getAllPersons($id){
        return $this->companyRepository->getAllPersons($id);
    }

    public function findById($id){
        return $this->companyRepository->findById($id);
    }
}