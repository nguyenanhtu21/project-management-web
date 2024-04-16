<?php
namespace App\Services;
use App\Repositories\DepartmentRepository;

class DepartmentService{
    private $departmentRepository;
    public function __construct(DepartmentRepository $departmentRepository){
        $this->departmentRepository = $departmentRepository;
    }

    public function delete($id){
        $department = $this->departmentRepository->findById($id);
        $department->delete();
    }
}