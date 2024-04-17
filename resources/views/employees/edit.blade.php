<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row justify-content-center mt-3">
                <div class="col-md-8">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <div class="float-start">
                                Edit Employee
                            </div>
                            <div class="float-end">
                                <a href="{{ route('employees.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('employees.update', $employee->id) }}" method="post">
                                @csrf
                                @method("PUT")


                                <div class="mb-3 row">
                                    <label for="firstname" class="col-md-4 col-form-label text-md-end text-start">First Name</label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" value="{{ $employee->firstname }}">
                                        @if ($errors->has('firstname'))
                                            <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="lastname" class="col-md-4 col-form-label text-md-end text-start">Last Name</label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ $employee->lastname }}">
                                        @if ($errors->has('lastname'))
                                            <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="factory_id" class="col-md-4 col-form-label text-md-end text-start">Factory</label>
                                    <div class="col-md-6">
                                        <select name="factory_id" class="form-control select2" style="width: 100%;">
                                        <option value="">-- Select Factory --</option>
                                        @foreach ($factories as $data)
                                        <option value="{{$data->id}}" @if($data->id == $f_id) selected @endif>
                                            {{$data->factory_name}}
                                        </option>
                                        @endforeach
                                        </select>
                                        @if ($errors->has('factory_id'))
                                            <span class="text-danger">{{ $errors->first('factory_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $employee->email }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-end text-start">Phone</label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $employee->phone }}">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                               

                                                  
                                
                                <div class="mb-3 row">
                                    <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</x-app-layout>
