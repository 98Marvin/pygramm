<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            Welcome... <b>{{ auth()->user()->name }}</b>


            <b class="float-right">
                <span class="badge badge-success">{{ $users->count() }}</span>Users
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($users as $i=>$user)
                    
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
                </tbody>
              </table> 
        
        </div>
    </div>
</x-app-layout>
