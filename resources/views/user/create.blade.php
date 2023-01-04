@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="p-2 flex-grow-1">{{ __('User Profile') }}</div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row mb-5">
                        <div class="d-flex">
                            <div class="p-2 flex-grow-1">Email: {{Auth::user()->email}}</div>
                            <div class="p-2">Phone: {{Auth::user()->phone}}</div>
                        </div>
                    </div>

                    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mt-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                            <div class="col-md-6">
                                <input type="text" id="first_name" class="form-control" name="first_name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                            <div class="col-md-6">
                                <input type="text" id="last_name" class="form-control" name="last_name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                            <div class="col-md-6">
                                <input type="text" id="address" class="form-control" name="address" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                            <div class="col-md-6">
                                <input type="file" id="image" class="form-control" name="image" required autofocus>
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-4 mt-2 pl-2">
                            <button type="submit" class="btn btn-primary">
                                COMPLETE
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
