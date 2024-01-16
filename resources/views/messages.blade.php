<div class="clear-both"></div>

@if (!empty(session('success')))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (!empty(session('error')))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if (!empty(session('payment error')))
    <div class="alert alert-danger alert-dismissible fade in" role="alert"> <!-- Changed alert-error to alert-danger -->
        {{ session('payment error') }}
    </div>
@endif

@if (!empty(session('warning')))
    <div class="alert alert-warning alert-dismissible fade in" role="alert">
        {{ session('warning') }}
    </div>
@endif

@if (!empty(session('info')))
    <div class="alert alert-info alert-dismissible fade in" role="alert">
        {{ session('info') }} <!-- Corrected from 'into' to 'info' -->
    </div>
@endif

@if (!empty(session('secondary')))
    <div class="alert alert-secondary alert-dismissible fade in" role="alert">
        {{ session('secondary') }}
    </div>
@endif

@if (!empty(session('primary')))
    <div class="alert alert-primary alert-dismissible fade in" role="alert">
        {{ session('primary') }}
    </div>
@endif

@if (!empty(session('light')))
    <div class="alert alert-light alert-dismissible fade in" role="alert">
        {{ session('light') }}
    </div>
@endif
