<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            <b>Edit Category</b>


            <b class="float-right">
                {{-- <span class="badge badge-success">{{ $users->count() }}</span>Users --}}
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Edit Category
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.update',$category->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="name" value="{{ $category->name }}"
                                        class="form-control @error('name') is-invalid @enderror" id="name">

                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-warning">Update Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-app-layout>
