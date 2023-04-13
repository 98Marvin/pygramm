@extends('admin.master')

@section('content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Change Password</h2>
        </div>
        <div class="card-body">
            <form class="form-pill" method="post" action="{{ route('update.password') }}">
                @csrf
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" name="oldpassword" id="current_password"
                        placeholder="Current Password">

                    @error('oldpassword')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="New Password">
                    @error('password')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm Password">
                    @error('password_confirmation')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-dark">Save</button>
            </form>
        </div>
    </div>
@endsection
