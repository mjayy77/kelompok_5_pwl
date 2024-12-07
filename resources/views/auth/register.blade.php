@extends('layouts.app')

<title>Register</title>

<style>
    /* background */
    #main-content {
        background-image: url(storage/public/images/register.jpg);
        background-size: cover;
        background-position: center center;
        z-index: 0;
    }

    .bg {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.5);
    }

    /* form */
    .box {
        width: 50%;
        height: 60vh;
        justify-content: center;
        margin: 25%;
        padding: 0;
        border-radius: 10px;
        box-shadow: 0 0 10px 5px rgba(255, 255, 255, 0.3);
        background-color: rgba(243, 243, 243, 0.85);
    }

    .header {
        display: block;
        text-align: center;
        font-weight: bolder;
        font-size: 1.5rem;
        border: none;
        padding-top: 30px;
    }

    .subtitle {
        display: block;
        text-align: center;
        color: #666666;
        border: none;
        margin-bottom: 30px;
    }

    .form {
        display: block;
        justify-content: center;
        align-items: center;
        border: none;
        padding: 0 5vh;
    }

    #btn {
        background-color: #10375C;
        border: none;
        color: white;
        transition: 0.1s;
        padding: 7.5px 15px;
        margin: 7.5px 0;
    }

    #btn:hover {
        background-color: #FF6347;
    }

    #link {
        padding: 0;
        margin: 0;
        color: #a0210a;
    }

    #link:hover {
        color: #10375C;
    }

    #form-group {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
    }
</style>

@section('content')
<div class="bg">
    <div class="container">
        <div class="box">
            <div class="header">{{ __('REGISTER') }}</div>
            <div class="subtitle">Please fill in the registration information in the form below</div>

            <div class="form">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-4" id="form-group">
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div>
                    </div>

                    <div class="form-group mb-4" id="form-group">
                        <div class="col-md-7">
                            <button type="submit" class="btn btn-primary" id="btn">
                                {{ __('REGISTER') }}
                            </button>
                        </div>

                        <div class="col-md-6">
                            <a class="btn btn-link" id="link" href="{{ route('login') }}">
                                {{ __('Have an account already?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</div>
@endsection
