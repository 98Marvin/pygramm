@extends('admin.master')

@section('content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Update Profile</h2>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card-body">
            <form class="form-pill" method="post" action="{{ route('update.profile') }}">
                @csrf
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">

                </div>

                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" name="email" id="name" value="{{ $user->email }}">

                </div>

                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
@endsection
