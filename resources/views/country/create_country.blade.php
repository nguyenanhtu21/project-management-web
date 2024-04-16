@extends('master')
@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#" style="text-decoration:none;">Home</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/country" style="text-decoration:none;">Country</a></li>
    <li class="breadcrumb-item active" aria-current="page">create</li>
  </ol>
</nav>
@endsection
@section('main')
<div class="col-lg-6 col-sm-12 ">
<form method="POST" action="/dashboard/country/store">
  @csrf
  <div class="form-group mb-3">
    <label for="code" class="form-label">Country code</label>
    <input type="text" class="form-control" id="code" name="code">
  </div>
  <div class="form-group mb-3">
  <label for="name" class="form-label">Country name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
  <label for="name" class="form-label">Country description</label>
    <input type="text" class="form-control" id="description" name="description">
  </div>
  <input type="submit" class="btn btn-info mt-2" value="Lưu">
</form>
</div>
@endsection