@extends('master')
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" style="text-decoration:none;">Home</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/user" style="text-decoration:none;">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">create</li>
    </ol>
</nav>
@endsection
@section('main')
<div style="border: 1px solid rgba(0,0,0,0.1);">
    <div class="title">
        <p class="ms-3 text-white">Thêm mới</p>
    </div>
    <div class="container">
        <form class="row mb-3" method="POST" action="/dashboard/user/store">
            @csrf
            <div class="col-6">
                <div class="form-group mb-3">
                    <label class="ml-1">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Nhập email">
                </div>
                <div class="form-group mb-3">
                    <label class="ml-1">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="is_active" id="is_active_checkbox" value="0">
                    <label class="form-check-label">Kích hoạt</label>
                </div>
                <div class="form-group mb-3">
                    <label class="">Phân quyền</label>
                    <select class="form-select mb-3" id="roles" name="role_id[]" multiple>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->role_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="ml-1">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone_number" placeholder="Nhập số điện thoại">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label>Họ tên</label>
                    <input type="text" class="form-control" name="full_name" placeholder="Nhập họ tên">
                </div>
                <div class="form-group mb-3">
                    <label>Ngày sinh</label>
                    <input type="date" class="form-control" name="birthdate">
                </div>
                <div class="form-group mb-3">
                    <label class="">Giới tính</label>
                    <select class="form-select mb-3" name="gender">
                        <option selected>Chọn giới tính</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="ml-1">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ">
                </div>
                <div class="form-group mb-3">
                    <label class="">Công ty</label>
                    <select class="form-select mb-3" name="company_id">
                        <option selected disabled>Chọn công ty</option>
                        @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group d-flex justify-content-center">
                <input onclick="getSelectedValues()" type="submit" class="btn text-white col-1 mt-2"
                    style="background-color: #08c4c4;" value="Lưu">
            </div>
        </form>
    </div>
</div>
@endsection