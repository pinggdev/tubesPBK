<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pro.id - Belajar Coding dan Design</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
    <a class="navbar-brand" href="/"><img src="{{ asset('admin/assets/images/logo/proid.png') }}" height="60px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            {{-- <div class="container"> --}}
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 kiri">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kelas-page">Kelas</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Tentang</a>
                    </li>
                </ul>
                <ul class="navbar-nav nav-right kanan">
                    {{-- @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif --}}
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="@if (auth()->user()->role == 'admin') /home @else /profil @endif">Hi, {{ Auth::user()->name }}!!   <img src="{{ Auth::user()->getAvatar() }}" alt="" style="width: 20px; height: 20px; border-radius: 50%;"></a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            {{-- </div> --}}
        </div>
    </div>
</nav>

<body>