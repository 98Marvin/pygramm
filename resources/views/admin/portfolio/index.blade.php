@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Portfolio</h2>


                    <a class="btn btn-success btn-sm ml-auto" href="{{ route('add.portfolio') }}">Create</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Category</th>
                                <th scope="col">Client</th>
                                <th scope="col">Url</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($portfolios as $i=>$portfolio)
                                <tr>
                                    <td scope="row">{{ ++$i }}</td>
                                    <td>{{ $portfolio->name }}</td>
                                    <td>
                                        <img src="/{{ $portfolio->image }}"
                                            style="height: 40px; border-radius:10px; width: 40px;" alt="">

                                    </td>
                                    <td>{{ $portfolio->category }}</td>
                                    <td>{{ $portfolio->client }}</td>
                                    <td>{{ $portfolio->url }}</td>
                                    <td class="btn-group">
                                        <a href="{{ url('portfolio/edit/' . $portfolio->id) }}"
                                            class="btn btn-sm btn-warning mr-1"><i class="mdi mdi-lead-pencil"></i></a>
                                        <a href="{{ url('portfolio/delete/' . $portfolio->id) }}"
                                            onclick="return confirm('Are you sure you want to delete portfolio...?')"
                                            class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
