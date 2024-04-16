@if(session('success'))
<div class="success-message card text-white bg-success mb-3" id="message" style="max-width: 18rem;">
  <div class="card-body">
    <h6 class="card-title">Thành công</h6>
    <p class="card-text">{{session('success')}}</p>
  </div>
</div>
@endif