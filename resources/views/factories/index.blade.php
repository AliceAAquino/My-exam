<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row justify-content-center mt-3">
                <div class="col-md-12">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">Factory List</div>
                        <div class="card-body">
                            <a href="{{ route('factories.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Factory</a>
                            <table class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">Factory Name</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Website</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ($factories as $factory)
                                    <tr>
                                        <td>{{ $factory->factory_name }}</td>
                                        <td>{{ $factory->location }}</td>
                                        <td>{{ $factory->email }}</td>
                                        <td>{{ $factory->website }}</td>
                                        <td>
                                            <form action="{{ route('factories.destroy', $factory->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ route('factories.show', $factory->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                                <a href="{{ route('factories.edit', $factory->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this factory?');"><i class="bi bi-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <td colspan="6">
                                            <span class="text-danger">
                                                <strong>No Factory Found!</strong>
                                            </span>
                                        </td>
                                    @endforelse
                                </tbody>
                              </table>

                              {{ $factories->links() }}

                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</x-app-layout>
