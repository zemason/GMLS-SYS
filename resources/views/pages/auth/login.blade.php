{{-- @extends('layouts.auth')

@section('title', 'Masuk')

@section('content')

        <h5 class="fw-bold">Selamat Datang di SPHERE</h5>
        <p class="text-muted mt-2">Silahkan masuk untuk melanjutkan</p>

        <button class="btn btn-primary py-2 w-100 mt-4" type="button">
            <i class="fa-brands fa-google me-2"></i>
            Masuk dengan Google
        </button>

        <div class="d-flex align-items-center mt-2">
            <hr class="flex-grow-1" />
            <span class="mx-2">atau</span>
            <hr class="flex-grow-1" />
        </div>

        <form action="{{ route('login.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"/>

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"/>

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-primary w-100 mt-2" type="submit" id="btn-login">
                Masuk
            </button>

            <div class="d-flex justify-content-between mt-3">
                <a href="signup.html" class="text-decoration-none text-primary">Belum punya akun?</a>
                <a href="#" class="text-decoration-none text-primary">Lupa Password</a>
            </div>
        </form>

@endsection --}}

{{-- @extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<div class="space-y-6">
    <h5 class="font-bold text-xl text-center">Selamat Datang di SPHERE</h5>
    <p class="text-gray-500 mt-2 text-center">Silahkan masuk untuk melanjutkan</p>

    <button class="w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded flex items-center justify-center" type="button">
        <i class="fa-brands fa-google mr-2"></i>
        Masuk dengan Google
    </button>

    <div class="flex items-center mt-2">
        <hr class="flex-grow border-t border-gray-300" />
        <span class="mx-2 text-gray-500">atau</span>
        <hr class="flex-grow border-t border-gray-300" />
    </div>

    <form action="{{ route('login.store') }}" method="POST" class="mt-4 space-y-4">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" class="w-full px-3 py-2 border rounded-md @error('email') border-red-500 @enderror" id="email" name="email"/>
            
            @error('email')
                <div class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" class="w-full px-3 py-2 border rounded-md @error('password') border-red-500 @enderror" id="password" name="password"/>
            
            @error('password')
                <div class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="w-full mt-2 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded" type="submit" id="btn-login">
            Masuk
        </button>

        <div class="flex justify-between mt-3">
            <a href="signup.html" class="text-blue-600 hover:text-blue-800 text-sm">Belum punya akun?</a>
            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">Lupa Password</a>
        </div>
    </form>
</div>
@endsection --}}

@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-xl shadow-lg overflow-hidden p-12">
    <!-- Logo/Header Section -->
    <div class="text-center mb-8">
        <div class="mx-auto w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mb-4 overflow-hidden">
            <img src="/storage/logo/logogmls.png" alt="GMLS Logo" class="h-20 w-20 rounded-full object-contain">
        </div>
        <h2 class="text-2xl font-bold text-gray-800">GMLS-SYS</h2>
        <p class="text-gray-500 mt-2">SILAHKAN MASUK UNTUK MELANJUTKAN</p>
    </div>

    <!-- Social Login Button -->
    {{-- <button class="w-full flex items-center justify-center px-4 py-3 mb-6 border border-gray-300 rounded-lg shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
        <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"/>
        </svg>
        Masuk dengan Google
    </button> --}}

    @if (session()->has('success'))

        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    
    @endif

    <!-- Divider -->
    {{-- <div class="relative mb-6">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300"></div>
        </div>
        <div class="relative flex justify-center">
            <span class="px-2 bg-white text-gray-500 text-sm">atau masuk dengan email</span>
        </div>
    </div> --}}

    <!-- Login Form -->
    <form action="{{ route('login.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Email Field -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                </div>
                <input type="email" id="email" name="email" class="block w-full pl-10 pr-3 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="email@contoh.com">
            </div>
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password Field -->
        <div>
            <div class="flex justify-between items-center mb-1">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                {{-- <a href="#" class="text-sm text-blue-600 hover:text-blue-500">Lupa password?</a> --}}
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="password" id="password" name="password" class="block w-full pl-10 pr-3 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="••••••••">
            </div>
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me & Submit -->
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                {{-- <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="remember-me" class="ml-2 block text-sm text-gray-700">Ingat saya</label> --}}
            </div>
            <button type="submit" id="btn-login" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-md shadow-sm hover:from-blue-700 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
                Masuk
            </button>
        </div>
    </form>

    <!-- Sign Up Link -->
    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">Daftar sekarang</a>
        </p>
    </div>
</div>
@endsection

{{-- @extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden p-8">
    <!-- Logo/Header Section -->
    <div class="text-center mb-8">
        <div class="mx-auto w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-800">GMLS-SYS</h2>
        <p class="text-gray-500 mt-2">Silahkan masuk untuk melanjutkan</p>
    </div>

    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    </div>
    @endif

    <!-- Social Login Button -->
    <button class="w-full flex items-center justify-center px-4 py-3 mb-6 border border-gray-200 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
        <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"/>
        </svg>
        Masuk dengan Google
    </button>

    <!-- Divider -->
    <div class="relative mb-6">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-200"></div>
        </div>
        <div class="relative flex justify-center">
            <span class="px-2 bg-white text-gray-500 text-sm">atau masuk dengan email</span>
        </div>
    </div>

    <!-- Login Form -->
    <form action="{{ route('login.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Email Field -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                </div>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="block w-full pl-10 pr-3 py-2 border @error('email') border-red-300 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                       placeholder="email@contoh.com">
            </div>
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password Field -->
        <div>
            <div class="flex justify-between items-center mb-1">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <a href="#" class="text-sm text-blue-600 hover:text-blue-500">Lupa password?</a>
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="password" id="password" name="password" 
                       class="block w-full pl-10 pr-3 py-2 border @error('password') border-red-300 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                       placeholder="••••••••">
            </div>
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me & Submit -->
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="remember-me" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                Masuk
            </button>
        </div>
    </form>

    <!-- Sign Up Link -->
    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">Daftar sekarang</a>
        </p>
    </div>
</div>
@endsection --}}