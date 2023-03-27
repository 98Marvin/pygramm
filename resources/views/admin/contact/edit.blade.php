@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Contact</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('contact.update', $contact->id) }}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" required name="address" class="form-control" id="address"
                                value="{{ $contact->address }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" required name="email" class="form-control" id="email"
                                value="{{ $contact->email }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">phone</label>
                            <input type="text" required name="phone" class="form-control" value="{{ $contact->phone }}"
                                id="phone">
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-warning btn-default">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
