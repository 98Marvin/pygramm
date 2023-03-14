@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Slider</h2>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('slider.update', $slide->id) }}">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title"
                                value="{{ $slide->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description">{{ $slide->description }}</textarea>
                        </div>
                        <input type="hidden" name="old_image" value="{{ $slide->image }}" id="">

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control-file" id="image">

                            <div class="form-group mt-2">
                                <img src="{{ asset($slide->image) }}" alt=""
                                    style="height: 80px; border-radius:10px; width: 80px;">
                            </div>
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-warning btn-default">Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
