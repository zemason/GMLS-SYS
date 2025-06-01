@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Lokasi Pengungsian Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-500 mb-2">Total Lokasi Pengungsian</h3>
                <h1 class="text-3xl font-bold text-blue-600">{{ \App\Models\Lokasi::count() }}</h1>
            </div>
            <div class="bg-blue-100 px-6 py-2">
                <a href="{{ route('admin.lokasi.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800">Lihat Detail →</a>
            </div>
        </div>

        <!-- Relawan Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-500 mb-2">Total Relawan</h3>
                <h1 class="text-3xl font-bold text-green-600">{{ \App\Models\Relawan::count() }}</h1>
            </div>
            <div class="bg-green-100 px-6 py-2">
                <a href="{{ route('admin.relawan.index') }}" class="text-sm font-medium text-green-600 hover:text-green-800">Lihat Detail →</a>
            </div>
        </div>

        <!-- Desa Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-500 mb-2">Total Desa</h3>
                <h1 class="text-3xl font-bold text-purple-600">{{ \App\Models\Desa::count() }}</h1>
            </div>
            <div class="bg-purple-100 px-6 py-2">
                <a href="{{ route('admin.desa.index') }}" class="text-sm font-medium text-purple-600 hover:text-green-800">Lihat Detail →</a>
    </div>
</div>
@endsection