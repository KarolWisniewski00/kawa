<!--ALERT-->
<div class="container">
    @if(Session::has('success'))
    <div>
        <div class="alert alert-success">{{Session::get('success')}}</div>
    </div>
    @endif

    @if(Session::has('fail'))
    <div>
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
    </div>
    @endif
</div>