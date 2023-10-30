@if (session()->has('create'))
    <div class="alert alert-success alert-dismissible fade show text-center mx-auto" role="alert" style="width:50%;">
        {{ session('create') }}
    </div>
@endif

@if (session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show text-center mx-auto" role="alert" style="width:50%;">
        {{ session('delete') }}
    </div>
@endif

@if (session()->has('update'))
    <div class="alert alert-success alert-dismissible fade show text-center mx-auto" role="alert" style="width:50%;">
        {{ session('update') }}
    </div>
@endif


@if (session()->has('user_error'))
    <div class="alert alert-danger alert-dismissible fade show text-center mx-auto" role="alert" style="width:50%;">
        {{ session('user_error') }}
    </div>
@endif


