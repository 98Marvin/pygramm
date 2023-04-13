@extends('admin.master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Edit Client
                        </div>
                        <div class="card-body">
                            <form action="{{ route('client.update', $client->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <input type="hidden" name="old_image" value="{{ $client->image }}" id="">
                                <div class="form-group">
                                    <label for="name">Client Name</label>
                                    <input type="text" name="client_name" value="{{ $client->client_name }}"
                                        class="form-control @error('client_name') is-invalid @enderror" id="name">

                                    @error('client_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">Client Image</label>
                                    <input type="file" name="image" value="{{ $client->image }}"
                                        class="form-control @error('image') is-invalid @enderror" id="name">

                                    @error('image')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group mt-2">
                                        <img src="{{ asset($client->image) }}" alt=""
                                            style="height: 60px; border-radius:10px; width: 60px;">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-warning">Update Client</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
