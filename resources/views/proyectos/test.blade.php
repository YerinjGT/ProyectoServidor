@extends('layouts.auth_app')
@section('title')
    Admin Login
@endsection
@section('content')


    <div class="card card-primary">
        <div class="card-header"><h4>Admin Login</h4></div>

        <div class="card-body">
            @if (true)
                <button class="btn @php echo (1 < 0 ? 'btn-primary' : 'btn-danger') @endphp" ></button>
                @else
                <button class="btn @php echo (1 < 0 ? 'btn-primary' : 'btn-danger') @endphp" ></button>
            @endif



        </div>
    </div>
@endsection
