@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Create Contact</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="phone">phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="+254" id="phone">
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-success btn-default">Submit</button>
                            <button type="reset" class="btn btn-secondary btn-default">Reset</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
