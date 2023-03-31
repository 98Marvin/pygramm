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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($portfolios as $portfolio)
                                
                            <tr>
                                <td scope="row">1</td>
                                <td>{{ $portfolio->name }}</td>
                                <td>
                                    <img src="/{{ $portfolio->image }}"
                                        style="height: 40px; border-radius:10px; width: 40px;" alt="">

                                </td>
                                <td>{{ $portfolio->category }}</td>
                                <td>{{ $portfolio->client }}</td>
                                <td>{{ $portfolio->url }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection