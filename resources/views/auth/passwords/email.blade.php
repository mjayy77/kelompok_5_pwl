@extends('layouts.app')

<title>Forget Password</title>

<style>
    /* background */
    #main-content {
        background-image: url(storage/public/images/email.jpg);
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
        padding-top: 35px;
    }

    .subtitle {
        display: block;
        text-align: center;
        color: #666666;
        border: none;
        margin-bottom: 25px;
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

    #buttons {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        margin-top: 25px;
    }
</style>

@section('content')
<div class="bg">
    <div class="container">
        <div class="box">
            <div class="header">{{ __('RESET PASSWORD') }}</div>
            <div class="subtitle">{{ __('Password reset instruction will be sent to your mailbox') }}</div>

            <div class="body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-4" id="buttons">
                        <div class="col-md-11">
                            <button type="submit" class="btn btn-primary" id="btn">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>

                        <div class="col-md-8">
                            <a class="btn btn-link" id="link" href="{{ route('login') }}">
                                {{ __('Back') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
