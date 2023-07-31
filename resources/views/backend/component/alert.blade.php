<!-- alert Toast -->
<div id="alert-success" class="position-fixed toast toast-show fade show alert alert-soft-success" role="alert" aria-live="assertive" aria-atomic="true" style="top: 63px; right: 20px; z-index: 1000;">
    <div class="d-flex align-items-center flex-grow-1">
        <div class="flex-grow-1 ms-3">
            {{Session::get('message')}}
        </div>
        <div class="text-end">
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<!-- End alert Toast -->
