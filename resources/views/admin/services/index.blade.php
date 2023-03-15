@extends('admin.master')

@section('content')
    <div class="py-12">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
                            All Services
                        </div>



                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <th style="width: 5%;" scope="row">{{ $services->firstItem() + $loop->index }}</th>
                                        <td style="width: 20%;">{{ $service->name }}</td>
                                        <td style="width: 30%;">{{ $service->description }}</td>
                                        <td style="width: 20%;">
                                            <a href="{{ url('services/edit/' . $service->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <a href="{{ url('services/delete/' . $service->id) }}"
                                                onclick="return confirm('Are you sure you want to delete service...?')"
                                                class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $services->links() }}
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
