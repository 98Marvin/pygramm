@extends('admin.master')

@section('content')
    <div class="py-12">

        <div class="container">
            <div class="row">

                <h4>Home Slider</h4>
                <a href="{{ route('add.slider') }}" class="btn btn-success btn-sm ml-2">Create</a>

                <div class="col-md-12 mt-4">
                    <div class="card">

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header">
                            All Sliders
                        </div>



                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <th scope="row">{{ $sliders->firstItem() + $loop->index }}</th>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->description }}</td>
                                        <td>
                                            <img src="/{{ $slider->image }}"
                                                style="height: 40px; border-radius:10px; width: 40px;" alt="">

                                        </td>
                                        <td>
                                            <a href="{{ url('slider/edit/' . $slider->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <a href="{{ url('brands/delete/' . $slider->id) }}"
                                                onclick="return confirm('Are you sure you want to delete slider...?')"
                                                class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
