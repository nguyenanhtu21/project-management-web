@extends('master')
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" style="text-decoration:none;">Home</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/company" style="text-decoration:none;">Company</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
@endsection
@section('main')
<div style="border: 1px solid rgba(0,0,0,0.1);">
    <div class="title">
        <p class="ms-3 text-white">Thêm mới</p>
    </div>
    <div class="container">
        <form class="row mb-3" method="POST" action="/dashboard/company/store">
            @csrf
            <div class="col-6">
                <div class="form-group mb-3">
                    <label class="ml-1">Mã công ty</label>
                    <input type="text" class="form-control" name="code" placeholder="Nhập mã công ty">
                </div>
                <div class="form-group mb-3">
                    <label class="ml-1">Tên công ty</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên công ty">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label class="ml-1">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ">
                </div>
            </div>
            <div class="form-group d-flex justify-content-center">
                <input type="submit" class="btn text-white col-1 mt-2" style="background-color: #08c4c4;" value="Lưu">
            </div>
        </form>
    </div>
</div>
@endsection