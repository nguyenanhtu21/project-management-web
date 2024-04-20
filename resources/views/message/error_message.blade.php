@if(session('error'))
<div class="message error-message card text-white bg-danger mb-3">
  <div class="card-body">
    <h6 class="card-title">Cảnh báo</h6>
    <p class="card-text">{{session('error')}}</p>
  </div>
</div>
@endif