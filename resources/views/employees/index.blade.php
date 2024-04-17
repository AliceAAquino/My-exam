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
                        <div class="card-header">Employee List</div>
                        <div class="card-body">
                            <a href="{{ route('employees.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Employee</a>
                            <table class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Factory</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->firstname }}</td>
                                        <td>{{ $employee->lastname }}</td>
                                        <td>{{ $employee->factory_name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this employee?');"><i class="bi bi-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <td colspan="6">
                                            <span class="text-danger">
                                                <strong>No Employee Found!</strong>
                                            </span>
                                        </td>
                                    @endforelse
                                </tbody>
                              </table>

                              {{ $employees->links() }}

                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</x-app-layout>
