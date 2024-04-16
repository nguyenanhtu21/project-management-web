<div id="modal" class="modal">
    <div class="container modal-container p-0">
        <div class="title">
            <p class="ms-3 text-white">Thêm phòng ban</p>
            <div class="btn-cancel-modal" id="btn-cancel-modal"><i class="bi bi-x-lg"></i></div>
        </div>
        <div class="container">
            <form method="POST" action="/dashboard/company/{{$company->id}}/department/add">
                @csrf
                <div class="form-group mb-3">
                    <label for="">Mã phòng ban</label>
                    <input type="text" class="form-control" placeholder="Nhập mã phòng ban" name="code">
                </div>
                <div class="form-group mb-3">
                    <label for="">Tên phòng ban</label>
                    <input type="text" class="form-control" placeholder="Nhập tên phòng ban" name="name">
                </div>
                <div class="form-group mb-3">
                    <label for="">Phòng ban cấp trên</label>
                    <select class="form-select mb-3" name="parent_id">
                        <option selected disabled>Chọn phòng ban cấp trên</option>
                        @foreach($company->departments as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">Công ty</label>
                    <input type="text" class="form-control" readonly value="{{$company->name}}">
                </div>
                <div class="form-group mb-3">
                    <input type="hidden" class="form-control" readonly name="company_id" value="{{$company->id}}">
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <input type="submit" class="btn btn-info text-white ps-4 pe-4" value="Lưu">
                </div>
            </form>
        </div>
    </div>
</div>