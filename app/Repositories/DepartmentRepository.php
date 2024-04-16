<?php
namespace App\Repositories;
use App\Models\Department;


class DepartmentRepository{

    public function getAll(){
        $department = Department::all();
        return $department;
    }

    public function save(Department $department){
        $department->save();
    }

    public function delete($id){
        $department = Department::find($id);
        $department->delete();
    }

    public function findById($id){
        $department = Department::find($id);
        return $department;
    }
}
