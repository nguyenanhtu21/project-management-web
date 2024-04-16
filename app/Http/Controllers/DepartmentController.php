<?php

namespace App\Http\Controllers;
use App\Services\DepartmentService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private $departmentService;

    public function __construct(DepartmentService $departmentService){
        $this->departmentService = $departmentService;
    }

    public function destroy($id){
        $this->departmentService->delete($id);
        return redirect()->back();
    }


}
