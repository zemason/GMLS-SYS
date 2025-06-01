@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="mx-auto bg-white rounded-xl shadow-lg overflow-hidden p-12"> 
    <div class="flex flex-col items-center justify-center gap-2 py-4">
        <img src="{{asset('storage/'. Auth::user()->relawan->avatar)}}" alt="avatar" class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-md">
        <h5 class="text-xl font-medium text-gray-800">{{ Auth::user()->name }}</h5>
    </div>

    <div class="gap-4 mt-6">
        <div class="bg-white rounded-lg shadow-sm p-4 text-center">
            <h5 class="text-2xl font-bold text-blue-600">{{ Auth::user()->relawan->lokasi->count() }}</h5>
            <p class="text-gray-600 mt-1"> Lokasi Pengungsian Dilaporkan</p>
        </div>
    </div>

    {{-- <div class="mt-6 space-y-2">
        <!-- Menu Items -->
        <a href="#" class="flex justify-between items-center p-4 bg-white rounded-lg hover:bg-gray-50 transition-colors">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-user text-gray-500 w-5 text-center"></i>
                <p class="text-gray-700">Pengaturan Akun</p>
            </div>
            <i class="fa-solid fa-chevron-right text-gray-400"></i>
        </a>
        
        <a href="#" class="flex justify-between items-center p-4 bg-white rounded-lg hover:bg-gray-50 transition-colors">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-lock text-gray-500 w-5 text-center"></i>
                <p class="text-gray-700">Kata sandi</p>
            </div>
            <i class="fa-solid fa-chevron-right text-gray-400"></i>
        </a>
        
        <a href="#" class="flex justify-between items-center p-4 bg-white rounded-lg hover:bg-gray-50 transition-colors">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-question-circle text-gray-500 w-5 text-center"></i>
                <p class="text-gray-700">Bantuan dan dukungan</p>
            </div>
            <i class="fa-solid fa-chevron-right text-gray-400"></i>
        </a>
    </div> --}}

    <div class="mt-6">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>
<button class="w-32 py-2 px-4 border border-red-500 text-red-500 rounded-full hover:bg-red-50 transition-colors focus:outline-none focus:ring-2 focus:ring-red-200 mx-auto block"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Keluar
</button>
    </div>
</div>

@endsection