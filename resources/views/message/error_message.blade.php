@if(session('error'))
<div class="error-message card text-white bg-danger mb-3" id="message">
  <div class="card-body">
    <h6 class="card-title">Cảnh báo</h6>
    <p class="card-text">{{session('error')}}</p>
  </div>
</div>
@endif