@extends('master')
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" style="text-decoration:none;">Home</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/user" style="text-decoration:none;">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
@endsection
@section('main')
<div style="border: 1px solid rgba(0,0,0,0.1);">
    <div class="title">
        <p class="ms-3 text-white">Cập nhật</p>
    </div>
    <div class="container">
        <form class="row mb-3" method="POST" action="/dashboard/user/update/{{$user->id}}">
            @csrf
            <div class="col-6">
                <div class="form-group mb-3">
                    <label class="ml-1">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Nhập email"
                        value="{{$user->email}}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label class="ml-1">Mật khẩu</label>
                    <p class="text-danger mb-0" style="font-style: italic; font-size: 14px">Nhập nếu muốn đặt lại mật
                        khẩu</p>
                    <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="is_active" id="is_active_checkbox"
                        value="{{$user->is_active}}" {{ $user->is_active ? 'checked' : '' }}>
                    <label class="form-check-label">Kích hoạt</label>
                </div>
                <div class="form-group mb-3">
                    <label class="">Phân quyền</label>
                    <select class="form-select mb-3" id="roles-update" name="role_id[]" multiple>
                        @foreach($roles as $role)
                        @php
                            $selected = '';
                            foreach($user->roles as $userRole){
                                if($role->role_name == $userRole->role_name){
                                    $selected = 'selected';
                                    break;
                                }
                            }
                        @endphp
                        <option value="{{$role->id}}" {{$selected}}>{{$role->role_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="ml-1">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone_number" placeholder="Nhập số điện thoại"
                        value="{{$user->person->phone_number}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label>Họ tên</label>
                    <input type="text" class="form-control" name="full_name" placeholder="Nhập họ tên"
                        value="{{$user->person->full_name}}">
                </div>
                <div class="form-group mb-3">
                    <label>Ngày sinh</label>
                    <input type="date" class="form-control" name="birthdate" value="{{$user->person->birthdate}}">
                </div>
                <div class="form-group mb-3">
                    <label class="">Giới tính</label>
                    <select class="custom-select form-control" id="gender-select" name="gender">
                        <option value="" disabled {{ $user->person->gender ? '' : 'selected' }}>Chọn giới tính</option>
                        <option value="Nam" {{ $user->person->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ $user->person->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                        <option value="Khác" {{ $user->person->gender == 'Khác' ? 'selected' : '' }}>Khác</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="ml-1">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ"
                        value="{{$user->person->address}}">
                </div>
                <div class="form-group mb-3">
                    <label class="">Công ty</label>
                    <select class="form-select mb-3" name="company_id">
                        <option selected disabled>Chọn công ty</option>
                        @foreach($companies as $company)
                        <option value="{{$company->id}}"
                            {{$company->name == $user->person->company->name ? 'selected' : '' }}>{{$company->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group d-flex justify-content-center">
                <input type="submit" class="btn text-white col-1 mt-2" style="background-color: #08c4c4;" value="Lưu">
            </div>
        </form>
    </div>
</div>
@endsection