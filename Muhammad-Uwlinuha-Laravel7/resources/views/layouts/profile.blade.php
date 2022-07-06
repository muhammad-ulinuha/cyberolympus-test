@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>Nama : {{ Auth::user()->name }}</h5>
                    <br>
                    <h5>Email : {{ Auth::user()->email }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
