@extends('layouts.app')

@section('content')
<style>
    .bg-wh {
        background-color: #ffff;
        margin: auto;
        width: 60%;
        padding: 10px;
        margin-top: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }
    .bg-wh p {
        font-weight: 500;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row mt-4">
                        <div class="p-2 flex-grow-1 text-center mb-3"><h5>{{ __('User Profile') }}</h5></div>
                        <div class="img text-center">
                            <img style="border-radius: 50%; height: 80px; width: 80px; border: 2px solid blue" src="{{ asset($user->profile->image ) }}" alt="Avatar">
                        </div>
                        <div class="bg-wh text-center p-4">
                            <div class="d-flex justify-content-evenly">
                                <p>First Name: {{$user->profile->first_name}}</p>
                                <p>Last Name: {{$user->profile->last_name}}</p>
                            </div>
                            <p>Phone: {{$user->phone}}</p>
                            <p>Email: <a href="mailto:{{$user->email}}">{{$user->email}}</a></p>
                            <p>Address: {{$user->profile->address}}</p>
                            <p>Registration Date: {{$user->created_at->format('d M Y, h:i A')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
