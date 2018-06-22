@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Search') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="place" class="col-sm-4 col-form-label text-md-right">{{ __('Place') }}</label>

                            <div class="col-md-6">
                                <input id="Place" type="place" class="form-control{{ $errors->has('place') ? ' is-invalid' : '' }}" name="email" value="{{ old('place') }}" required autofocus>

                                @if ($errors->has('place'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="param" class="col-md-4 col-form-label text-md-right">{{ __('Search For?') }}</label>

                            <div class="col-md-6">
                                <input id="param" type="password" class="form-control{{ $errors->has('param') ? ' is-invalid' : '' }}" name="param" required>

                                @if ($errors->has('param'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('param') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Search') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
