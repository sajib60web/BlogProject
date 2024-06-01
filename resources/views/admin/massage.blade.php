@if ($errors->any())
    <div style="margin: 0 20px 20px;">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if (session()->has('massage'))
    <div style="margin: 0 20px 20px;">
        <div class="alert alert-{{ session('type') }}">
            {{ session('massage') }}
        </div>
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success">
        <div>
            <p>{{ Session::get('success') }}</p>
        </div>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger">
        <div>
            <p>{{ Session::get('error') }}</p>
        </div>
    </div>
@endif

@if (Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
@endif