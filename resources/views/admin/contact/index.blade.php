@extends('admin.master')

@section('content')
    <div class="py-12">

        <div class="container">
            <div class="row">

                <h4>Contacts</h4>
                <a href="{{ route('add.contact') }}" class="btn btn-success btn-sm ml-2">Create</a>

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
                            All Contacts
                        </div>



                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <th scope="row">{{ $contacts->firstItem() + $loop->index }}</th>
                                        <td>{{ $contact->address }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>
                                            <a href="{{ url('contact/edit/' . $contact->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <a href="{{ url('contact/delete/' . $contact->id) }}"
                                                onclick="return confirm('Are you sure you want to delete contact...?')"
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
