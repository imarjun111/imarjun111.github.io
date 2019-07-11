@extends('...Layout.login_layout')
@section('title','| Reset Password')

@section('content')
<div class="container">
    <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Send Your Link To Reset Password </h4>

                </div>

            </div>
    <div class="row justify-content-center">
        <div class="col-md-offset-2 col-md-8">
            <div class="card" style="border: 5px solid #f0f0f0">
                <div class="card-header" style="background-color: #f0f0f0;padding: 20px;"><h4 class="text-center">{{ __('Admin Reset Password') }}</h4></div>

                <div class="card-body" style="margin-top: 50px;padding: 20px">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.password.email') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6  col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
