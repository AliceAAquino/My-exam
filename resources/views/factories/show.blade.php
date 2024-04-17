<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row justify-content-center mt-3">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header">
                            <div class="float-start">
                                Factory Information
                            </div>
                            <div class="float-end">
                                <a href="{{ route('factories.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                            </div>
                        </div>
                        <div class="card-body">

                                <div class="row">
                                    <label for="factory_name" class="col-md-4 col-form-label text-md-end text-start">Factory Name: </label>
                                    <div class="col-md-6" style="line-height: 35px;">
                                        {{ $factory->factory_name }}
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="location" class="col-md-4 col-form-label text-md-end text-start">Location: </label>
                                    <div class="col-md-6" style="line-height: 35px;">
                                        {{ $factory->location }}
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email: </label>
                                    <div class="col-md-6" style="line-height: 35px;">
                                        {{ $factory->email }}
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="website" class="col-md-4 col-form-label text-md-end text-start">Website: </label>
                                    <div class="col-md-6" style="line-height: 35px;">
                                        {{ $factory->website }}
                                    </div>
                                </div>
                               
                    
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</x-app-layout>
