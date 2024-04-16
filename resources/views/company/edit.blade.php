@extends('master')
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" style="text-decoration:none;">Home</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/company" style="text-decoration:none;">Company</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
@endsection
@section('main')
@include('modals.create_department_modal')
<div style="border: 1px solid rgba(0,0,0,0.1);">
    <div class="title">
        <p class="ms-3 text-white">Cập nhật</p>
    </div>
    <div class="container">
        <form class="row mb-3" method="POST" action="/dashboard/company/update/{{$company->id}}">
            @csrf
            <div class="col-6">
                <div class="form-group mb-3">
                    <label class="ml-1">Mã công ty</label>
                    <input type="text" class="form-control" name="code" placeholder="Nhập mã công ty"
                        value="{{$company->code}}">
                </div>
                <div class="form-group mb-3">
                    <label class="ml-1">Tên công ty</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên công ty"
                        value="{{$company->name}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label class="ml-1">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ"
                        value="{{$company->address}}">
                </div>
            </div>
            <div class="form-group d-flex justify-content-center">
                <input type="submit" class="btn text-white col-1 mt-2" style="background-color: #08c4c4;" value="Lưu">
            </div>
        </form>
        <table class="table">
            <div class="title mb-0">
                <p class="ms-3 text-white mb-0">Danh sách phòng ban</p>
            </div>
            <thead>
                <tr>
                    <th scope="col">
                        <button class="btn btn-info text-white btn-add-department" id="btn-add-department">Thêm
                            mới</button>
                    </th>
                    <th scope="col">Thao tác</th>
                    <th scope="col">Mã phòng ban</th>
                    <th scope="col">Tên phòng ban</th>
                </tr>
            </thead>
            <tbody>
                @foreach($company->departments as $department)
                @if($department->parent_id===null)
                    <tr class="parent-row">
                        <td class="">
                            <i class="fas fa-angle-right"></i>
                            <input type="checkbox" class="">
                        </td>
                        <td class="">
                            <a href="/dashboard/department/edit/{{$department->id}}" class="text-decoration-none me-2">
                                <i class="bi bi-pencil-fill text-info fs-5"></i>
                            </a>
                            <a href="/dashboard/department/delete/{{$department->id}}" class="text-decoration-none">
                                <i class="bi bi-trash-fill text-warning fs-4"></i>
                            </a>
                        </td>
                        <td>{{$department->code}}</td>
                        <td>{{$department->name}}</td>
                    </tr>
                @endif
                    @foreach($department->childs() as $child)
                        <tr class="row-child">
                                <td class="">
                                <input type="checkbox" class="ms-4">
                            </td>
                            <td class="">
                                <a href="/dashboard/department/edit/{{$child->id}}" class="text-decoration-none me-2">
                                    <i class="bi bi-pencil-fill text-info fs-5"></i>
                                </a>
                                <a href="/dashboard/department/delete/{{$child->id}}" class="text-decoration-none">
                                    <i class="bi bi-trash-fill text-warning fs-4"></i>
                                </a>
                            </td>
                            <td>{{$child->code}}</td>
                            <td>{{$child->name}}</td>
                        </tr>
                        @foreach($child->childs() as $grandChild)
                            <tr class="row-grand-child">
                                <td class="">
                                    <input type="checkbox" class="ms-5">
                                </td>
                                <td class="">
                                    <a href="/dashboard/department/edit/{{$grandChild->id}}" class="text-decoration-none me-2">
                                        <i class="bi bi-pencil-fill text-info fs-5"></i>
                                    </a>
                                    <a href="/dashboard/department/delete/{{$grandChild->id}}" class="text-decoration-none">
                                        <i class="bi bi-trash-fill text-warning fs-4"></i>
                                    </a>
                                </td>
                                <td>{{$grandChild->code}}</td>
                                <td>{{$grandChild->name}}</td>
                            </tr>                 
                        @endforeach
                    @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection