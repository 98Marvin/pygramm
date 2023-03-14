@extends('admin.master')
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Edit Brand
                        </div>
                        <div class="card-body">
                            <form action="{{ route('brand.update', $brand->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <input type="hidden" name="old_image" value="{{ $brand->image }}" id="">
                                <div class="form-group">
                                    <label for="name">Brand Name</label>
                                    <input type="text" name="brand_name" value="{{ $brand->brand_name }}"
                                        class="form-control @error('brand_name') is-invalid @enderror" id="name">

                                    @error('brand_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">Brand Image</label>
                                    <input type="file" name="image" value="{{ $brand->image }}"
                                        class="form-control @error('image') is-invalid @enderror" id="name">

                                    @error('image')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group mt-2">
                                        <img src="{{ asset($brand->image) }}" alt=""
                                            style="height: 60px; border-radius:10px; width: 60px;">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-warning">Update Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
