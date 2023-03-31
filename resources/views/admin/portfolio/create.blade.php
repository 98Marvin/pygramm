@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                
                <div class="card-header card-header-border-bottom">
                    <h2>Add Portfolio</h2>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="{{ route('portfolio.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                                    required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="category">Category</label>
                                <input type="text" class="form-control" id="category" placeholder="Category"
                                    name="category" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="client">Client</label>
                                <input type="text" class="form-control" name="client" id="client"
                                    placeholder="Client" aria-describedby="inputGroupPrepend3" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="url">Url</label>
                                <input type="text" class="form-control" name="url" id="url" placeholder="Url"
                                    aria-describedby="inputGroupPrepend3" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" id="image" required>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
