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
                        <button class="btn btn-info text-white" id="btn-add-department">Thêm mới</button>
                    </th>
                    <th scope="col">Thao tác</th>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                <tr id="parent-row">
                    <td>
                        <div class="checkbox-wrapper-46">
                            <input class="inp-cbx" id="select-row-check" type="checkbox" />
                            <label class="cbx" for="select-row-check"><span>
                                    <svg width="12px" height="10px" viewbox="0 0 12 10">
                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                    </svg>
                            </label>
                        </div>
                    </td>
                    <td>
                        <a href="" class="btn btn-info text-white"><i class="bi bi-pencil-fill"></i></a>
                        <a href="" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                    </td>
                    <td>Globits</td>
                    <td>Globits</td>
                </tr>
                <tr class="child-row">
                    <td>
                        <div class="checkbox-wrapper-46 ms-3">
                            <input class="inp-cbx select-child-row-checkbox" id="cbx-46" type="checkbox" />
                            <label class="cbx" for="cbx-46"><span>
                                    <svg width="12px" height="10px" viewbox="0 0 12 10">
                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                    </svg>
                            </label>
                        </div>
                    </td>
                    <td>
                        <a href="" class="btn btn-info text-white"><i class="bi bi-pencil-fill"></i></a>
                        <a href="" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                    </td>
                    <td class="">Child Code</td>
                    <td class="">Child Name</td>
                </tr>
                <tr class="child-row">
                    <td>
                        <div class="checkbox-wrapper-46 ms-3">
                            <input class="inp-cbx select-child-row-checkbox" id="cbx-46" type="checkbox" />
                            <label class="cbx" for="cbx-46"><span>
                                    <svg width="12px" height="10px" viewbox="0 0 12 10">
                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                    </svg>
                            </label>
                        </div>
                    </td>
                    <td>
                        <a href="" class="btn btn-info text-white"><i class="bi bi-pencil-fill"></i></a>
                        <a href="" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                    </td>
                    <td class="">Child Code 1</td>
                    <td class="">Child Name 1</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection