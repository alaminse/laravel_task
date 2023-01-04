@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="p-2 flex-grow-1">{{ __('Dashboard') }}</div>
                        <div class="p-2"><a href="{{route('users.list')}}" class="btn btn-success">Users List</a></div>
                        <div class="p-2">
                            @if (Auth::user()->profile == null)
                                <a href="{{ route('profile.create')}}" class="btn btn-warning">Complete Your Profile</a>
                            @else
                                <a href="{{ route('user.profile')}}" class="btn btn-primary">User Profile</a>
                            @endif
                        </div>
                      </div>

                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    You are Logged In
                    <h5>Your Email: {{Auth::user()->email}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
