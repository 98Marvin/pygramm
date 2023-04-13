@extends('admin.master')

@section('content')
    <div class="py-12">

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-header">
                            All Clients
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
                                @foreach ($clients as $client)
                                    <tr>
                                        <th scope="row">{{ $clients->firstItem() + $loop->index }}</th>
                                        <td>{{ $client->client_name }}</td>
                                        <td>
                                            <img src="/{{ $client->image }}"
                                                style="height: 40px; border-radius:10px; width: 40px;" alt="">

                                        </td>
                                        <td>
                                            @if ($client->created_at == null)
                                                <span class="text-danger">Date was not set...!!</span>
                                            @else
                                                {{ Carbon\Carbon::parse($client->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('clients/edit/' . $client->id) }}"
                                                class="btn btn-sm btn-warning"><i class="mdi mdi-lead-pencil"></i></a>
                                            <a href="{{ url('clients/delete/' . $client->id) }}"
                                                onclick="return confirm('Are you sure you want to delete client...?')"
                                                class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $clients->links() }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Client
                        </div>
                        <div class="card-body">
                            <form action="{{ route('client.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="client_name">Client Name</label>
                                    <input type="text" name="client_name"
                                        class="form-control @error('client_name') is-invalid @enderror" id="client_name">

                                    @error('client_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">Client Image</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror">

                                    @error('image')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Save Client</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
