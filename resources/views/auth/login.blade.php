@extends('layouts.app')

<title>Login</title>

<style>
    /* Background */
    .bg {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100vh; /* Sesuai layar penuh */
        display: flex; /* Flexbox aktif */
        justify-content: center; /* Pusatkan horizontal */
        align-items: center; /* Pusatkan vertikal */
        position: relative; /* Membuat overlay berada di atas */
        background-image: url(storage/public/images/login.jpg);
        background-size: cover;
        background-position: center;
        background-color: rgba(0, 0, 0, 0.5); /* Transparansi */
    }

    /* Overlay Hitam */
    .overlay {
        position: absolute; /* Membuat overlay menutupi seluruh layar */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6); /* Warna hitam dengan transparansi */
        z-index: 1; /* Overlay berada di bawah form */
    }

    /* Box */
    .box {
        width: 50%; /* Lebar form */
        max-width: 600px; /* Batas maksimum lebar */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px 5px rgba(255, 255, 255, 0.3);
        background-color: rgba(243, 243, 243, 0.85);
        z-index: 2; /* Form login berada di atas overlay */
        position: relative; /* Form harus berada di atas overlay */
    }

    /* Header */
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
        margin-bottom: 35px;
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

    #redirect {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        margin-top: 0;
    }
</style>

@section('content')
<div class="bg">
    <div class="overlay"></div> <!-- Overlay hitam ditambahkan di sini -->
    <div class="box">
        <div class="header">{{ __('LOGIN') }}</div>
        <div class="subtitle">Log in using your account details</div>

        <div class="form">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-3">
                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-4">
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-4">
                    <div class="col-md-8 offset-md-5">
                        <button type="submit" class="btn btn-primary" id="btn">
                            {{ __('LOGIN') }}
                        </button>
                    </div>

                    <div class="form-group mb-4" id="redirect">
                        <div class="col-md-8">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" id="link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="col-md-8">
                            <a class="btn btn-link" id="link" href="{{ route('register') }}">
                                {{ __('Don\'t have an account?') }}
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
