@extends('layouts.main')



@section('content')
    
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">States</h1>
        </div>

        <div class="card">
            <div class="card-header">
                Create State
                <div class="float-right">
                    <a href="{{ route('states.index') }}" class="btn btn-info">Go back</a>
                </div>
            </div>


    
     

            <div class="card-body">
                <form method="POST" action="{{ route('states.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="country_code" class="col-md-4 col-form-label text-md-right">{{ __('Country Code') }}</label>
        
                        <div class="col-md-6" >
                            <select name="country_id" class="form-control" aria-label="Default select example">
                                <option selected>Selec a contry</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
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