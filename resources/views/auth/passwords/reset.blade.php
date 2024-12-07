@extends('layouts.app')

<title>Reset Password</title>

<style>
    /* background */
    #main-content {
        background-image: url(storage/public/images/reset.jpg);
        background-size: cover;
        background-position: center center;
    }

    .bg {
        margin: 0;
        padding: 0;
        top: 10;
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.5);
    }

    /* form */
    .box {
        width: 50%;
        height: 55vh;
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
        padding-top: 25px;
        margin-bottom: 15px;
    }

    .body {
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
        margin: 3px 0;
    }

    #btn:hover {
        background-color: #FF6347;
    }
</style>

@section('content')
<div class="bg">
<div class="container">
            <div class="box">
                <div class="header">{{ __('RESET PASSWORD') }}</div>

                <div class="body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm New Password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btn">
                                    {{ __('Reset Password') }}
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
