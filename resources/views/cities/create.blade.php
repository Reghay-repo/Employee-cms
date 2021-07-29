@extends('layouts.main')



@section('content')
    
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cities</h1>
        </div>

        <div class="card">
            <div class="card-header">
                Create City
                <div class="float-right">
                    <a href="{{ route('cities.index') }}" class="btn btn-info">Go back</a>
                </div>
            </div>


    
     

            <div class="card-body">
                <form method="POST" action="{{ route('cities.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="country_code" class="col-md-4 col-form-label text-md-right">{{ __('State Name') }}</label>
        
                        <div class="col-md-6" >
                            <select name="state_id" class="form-control" aria-label="Default select example">
                                <option selected>Selec a State</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>

                            
                            @error('country_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name ') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

               
          
                
                   
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Create  
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection