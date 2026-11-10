
@extends('layouts.app')

@section('title', 'Login - NgopiDawg')

@section('content')

<div class="login-page">

    {{-- BAGIAN KIRI: FORM LOGIN --}}
    <div class="login-left">

        <div class="login-form-wrapper">

            {{-- LOGO DAN NAMA BRAND --}}
            <div class="login-brand">

                {{-- Tempat logo PNG nantinya --}}
                <img
                src="{{ asset('images/logo.png') }}"
                alt="NgopiDawgLogo"
                class="login-logo-image">

                <h1>Ngopi Dawg</h1>

            </div>

            {{-- JUDUL LOGIN --}}
            <div class="login-heading">
                <h2>Welcome Back!</h2>
                <p>Silakan masuk ke akun internal NgopiDawg.</p>
            </div>

            {{-- FORM LOGIN --}}
            <form action="{{ route('login.process') }}" method="POST">

                @csrf

                {{-- USERNAME / EMAIL --}}
                <div class="login-form-group">

                    <label for="username">Username / Email</label>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Masukkan username atau email"
                        value="{{ old('username') }}"
                        autocomplete="username"
                        required
                    >

                    @error('username')
                        <small class="login-error">{{ $message }}</small>
                    @enderror

                </div>

                {{-- PASSWORD --}}
                <div class="login-form-group">

                    <label for="password">Password</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                        required
                    >

                    @error('password')
                        <small class="login-error">{{ $message }}</small>
                    @enderror

                </div>

                {{-- REMEMBER ME DAN FORGOT PASSWORD --}}
                <div class="login-options">

                    <label class="remember-option">
                        <input type="checkbox" id="remember">
                        <span>Remember me</span>
                    </label>

                    <a href="#" class="forgot-password">
                        Forgot Password?
                    </a>

                </div>

                {{-- LOGIN BUTTON --}}
                <button type="submit" class="login-button">
                    Log In
                </button>

            </form>

            {{-- INFORMASI BAWAH --}}
            <div class="login-footer-text">
                <p>Internal Management System</p>
                <span>© {{ date('Y') }} NgopiDawg</span>
            </div>

        </div>

    </div>


    {{-- BAGIAN KANAN: GAMBAR KOPI --}}

    <div class="login-right">

        <div class="login-image-placeholder">

            {{-- FOTO KOPI --}}
            <img
                src="{{ asset('images/2174329b8ef1603c1cbc68bd9ef5865a.jpg') }}"
                alt="NgopiDawg Coffee"
                class="login-coffee-image"
            >

            {{-- TEKS DI ATAS FOTO --}}
            <div class="login-image-caption">
                <h2>Start Your Day</h2>
                <p>One cup of coffee, endless possibilities.</p>
            </div>

        </div>

    </div>


</div>

@endsection
