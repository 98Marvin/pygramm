@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Create Slider</h2>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('slider.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Slider Title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control-file" id="image">
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
