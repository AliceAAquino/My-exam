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
                                Edit Product
                            </div>
                            <div class="float-end">
                                <a href="{{ route('factories.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('factories.update', $factory->id) }}" method="post">
                                @csrf
                                @method("PUT")


                                <div class="mb-3 row">
                                    <label for="factory_name" class="col-md-4 col-form-label text-md-end text-start">Factory Name</label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control @error('factory_name') is-invalid @enderror" id="factory_name" name="factory_name" value="{{ $factory->factory_name }}">
                                        @if ($errors->has('factory_name'))
                                            <span class="text-danger">{{ $errors->first('factory_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="location" class="col-md-4 col-form-label text-md-end text-start">Location</label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ $factory->location }}">
                                        @if ($errors->has('location'))
                                            <span class="text-danger">{{ $errors->first('location') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                                    <div class="col-md-6">
                                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $factory->email }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="website" class="col-md-4 col-form-label text-md-end text-start">Website</label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ $factory->website }}">
                                        @if ($errors->has('website'))
                                            <span class="text-danger">{{ $errors->first('website') }}</span>
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
