<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            <b>All Brands</b>

            <b class="float-right">
                <span class="badge badge-success">{{ $brands->count() }}</span>Brands
            </b>
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">
            <div class="row">
                <div class="col-md-8">
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
                            All Brands
                        </div>



                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <th scope="row">{{ $brands->firstItem() + $loop->index }}</th>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td>
                                            <img src="/{{ $brand->image }}"
                                                style="height: 40px; border-radius:10px; width: 40px;" alt="">

                                        </td>
                                        <td>
                                            @if ($brand->created_at == null)
                                                <span class="text-danger">Date was not set...!!</span>
                                            @else
                                                {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('brands/edit/' . $brand->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <a href="{{ url('brands/delete/' . $brand->id) }}"
                                                onclick="return confirm('Are you sure you want to delete brand...?')"
                                                class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $brands->links() }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Brand
                        </div>
                        <div class="card-body">
                            <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="brand_name">Brand Name</label>
                                    <input type="text" name="brand_name"
                                        class="form-control @error('brand_name') is-invalid @enderror" id="brand_name">

                                    @error('brand_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">Brand Image</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror">

                                    @error('image')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Save Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-app-layout>
