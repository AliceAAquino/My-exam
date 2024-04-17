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
                                <a href="{{ route('employees.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                            </div>
                        </div>
                        <div class="card-body">

                                <div class="row">
                                    <label for="firstname" class="col-md-4 col-form-label text-md-end text-start">First Name: </label>
                                    <div class="col-md-6" style="line-height: 35px;">
                                        {{ $employee->firstname }}
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="lastname" class="col-md-4 col-form-label text-md-end text-start">Last Name: </label>
                                    <div class="col-md-6" style="line-height: 35px;">
                                        {{ $employee->lastname }}
                                    </div>
                                </div>
                               
                                 <div class="row">
                                    <label for="factory_id" class="col-md-4 col-form-label text-md-end text-start">Factory: </label>
                                    <div class="col-md-6" style="line-height: 35px;">
                                        {{ $factories[0] }}
                                    </div>
                                </div>

                                 <div class="row">
                                    <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email: </label>
                                    <div class="col-md-6" style="line-height: 35px;">
                                        {{ $employee->email }}
                                    </div>
                                </div>
                                
                                 <div class="row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-end text-start">Phone: </label>
                                    <div class="col-md-6" style="line-height: 35px;">
                                        {{ $employee->phone }}
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</x-app-layout>
