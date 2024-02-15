<div id="alert">
 @if(Session::has('success')) 
 <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top:2rem">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>Success!</strong> {{ Session::get('success')}}</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

 @elseif(Session::has('warning')) 
 <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top:2rem">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>{{ Session::get('warning')}}</strong></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@elseif(Session::has('error')) 
 <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:2rem">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>{{ Session::get('error')}}</strong> </span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@elseif(Session::has('info')) 
 <div class="alert alert-info alert-dismissible fade show" role="alert" style="margin-top:2rem">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>{{ Session::get('info')}}</strong></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

 @endif
 
</div>