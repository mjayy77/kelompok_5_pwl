@extends('layouts.app')

<title>Register</title>

<style>
    /* Background */
    .bg {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        background-image: url(storage/public/images/login.jpg);
        background-size: cover;
        background-position: center;
        background-color: rgba(0, 0, 0, 0.5);
    }

    /* Overlay Hitam */
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 1;
    }

    /* Box */
    .box {
        width: 50%;
        max-width: 600px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px 5px rgba(255, 255, 255, 0.3);
        background-color: rgba(243, 243, 243, 0.85);
        z-index: 2;
        position: relative;
        height: auto; 
        min-height: 450px;
    }

    /* Header */
    .header {
        text-align: center;
        font-weight: bolder;
        font-size: 1.5rem;
        padding-top: 35px;
    }

    .subtitle {
        text-align: center;
        color: #666666;
        margin-bottom: 35px;
    }

    .form {
        padding: 0 5vh;
    }

    /* Button */
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

    /* Link */
    #link {
        color: #a0210a;
    }

    #link:hover {
        color: #10375C;
    }

    /* Form group */
    .form-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .text-end {
    text-align: right; /* Mengarahkan teks link ke kanan */
    }

    .form-group .col-md-6 {
        flex: 1; /* Membuat kedua input memiliki lebar sama */
        display: flex;
        flex-direction: column; /* Pesan error di bawah input */
    }

    .invalid-feedback {
        font-size: 0.85rem;
        color: red;
        margin-top: 5px;
    }

    .w-100 {
        width: 100%;
    }

    .text-end {
        text-align: right;
    }
</style>

@section('content')
<div class="bg">
    <div class="overlay"></div>
    <div class="box">
        <div class="header">{{ __('REGISTER') }}</div>
        <div class="subtitle">Please fill in the registration information in the form below</div>

        <div class="form">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Field Name -->
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

                <!-- Field Email -->
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

                <div class="form-group mb-4">
                    <!-- Password Input -->
                    <div class="d-flex">
                        <div class="col-md-6 pe-2">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="col-md-6 ps-2">
                            <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>



                <!-- Register Button & Link -->
                <div class="form-group mb-4">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary w-100" id="btn">
                            {{ __('REGISTER') }}
                        </button>
                    </div>
                    <div class="col-md-6 text-end">
                        <a class="btn btn-link" id="link" href="{{ route('login') }}">
                            {{ __('Have an account already?') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>  
</div>
@endsection
