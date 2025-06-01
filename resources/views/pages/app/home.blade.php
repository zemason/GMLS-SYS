@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Hero Section -->
    <div class="bg-blue-50 rounded-lg p-8 mb-8 flex items-center">
        <!-- Gambar di sebelah kiri -->
        <div class="mr-6 hidden md:block">
            <img src="/storage/logo/logogmls.png" alt="logo gmls" class="w-32 h-32 rounded-full object-contain">
        </div>
        
        <!-- Konten teks -->
        <div class="flex-1">
            @auth
            <h6 class="text-xl text-blue-600 font-medium">Hi, {{ Auth::user()->name }}</h6>
            <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Silahkan Lihat Daftar Lokasi Pengungsian</h2>
            @else
            <h6 class="text-xl text-blue-600 font-medium">Selamat Datang</h6>
            <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Silahkan Login Untuk Menambahkan Lokasi Pengungsian</h2>
            @endauth
        </div>
    </div>

    <!-- Village Filter Section -->
    <div class="mb-12">
        <h3 class="text-2xl font-semibold mb-4 text-gray-700">Pilih Desa</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach ($desas as $desa)
            <a href="{{ route('lokasi.index', ['desa' => $desa->nama_desa]) }}" 
               class="bg-white rounded-lg shadow-md p-4 text-center hover:bg-blue-50 transition duration-300">
                <p class="text-lg font-medium text-gray-700">{{ $desa->nama_desa }}</p>
            </a>
            @endforeach
        </div>
    </div>

    <!-- Shelter Locations Section -->
    <div class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-semibold text-gray-700">Daftar Lokasi Pengungsian</h3>
            <a href="{{ route('lokasi.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                Lihat semua →
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($lokasis as $lokasi)
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                <a href="{{ route('lokasi.show', $lokasi->id) }}" class="no-underline text-gray-900">
                    <div class="relative">
                        <img src="{{asset('storage/'. $lokasi->gambar_lokasi)}}" alt="{{ $lokasi->nama_lokasi }}" 
                             class="w-full h-56 object-cover">
                        
                        <!-- Status Badge -->
                        @if ($lokasi->statusLokasi->last()?->status === 'pending')
                            <div class="absolute top-3 right-3 bg-yellow-100 text-yellow-800 text-sm font-medium px-3 py-1 rounded-full">
                                Pending
                            </div>
                        @elseif ($lokasi->statusLokasi->last()?->status === 'approved')
                            <div class="absolute top-3 right-3 bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">
                                Disetujui
                            </div>
                        @elseif ($lokasi->statusLokasi->last()?->status === 'rejected')
                            <div class="absolute top-3 right-3 bg-red-100 text-red-800 text-sm font-medium px-3 py-1 rounded-full">
                                Ditolak
                            </div>
                        @elseif ($lokasi->statusLokasi->last()?->status == 'done')
                            <div class="absolute top-3 right-3 bg-purple-100 text-purple-800 text-sm font-medium px-3 py-1 rounded-full">
                                Selesai
                            </div>
                        @endif
                    </div>

                    <div class="p-5">
                        <h3 class="text-xl font-bold mb-2">{{ $lokasi->nama_lokasi }}</h3>
                        
                        <div class="flex items-center text-gray-600 mb-3">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>{{ $lokasi->alamat_lokasi }}</span>
                        </div>

                        <div class="flex justify-between items-center text-sm text-gray-500">
                            <span>{{ $lokasi->desa->nama_desa }}</span>
                            <span>{{ \Carbon\Carbon::parse($lokasi->created_at)->format('d M Y H:i') }}</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

{{-- @extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="px-4 py-6">
    @auth
    <h6 class="text-lg font-medium">Hi, {{ Auth::user()->name }}</h6>
    <h4 class="text-2xl font-bold mt-1 mb-4">Laporkan masalahmu dan kami segera atasi itu</h4>
@else
    <h6 class="text-lg font-medium">Selamat Datang</h6>
    <h4 class="text-2xl font-bold mt-1 mb-4">Silakan login untuk melaporkan masalah</h4>
@endauth

    <div class="flex items-center gap-4 py-3 overflow-x-auto whitespace-nowrap" id="desa">
        @foreach ($desas as $desa )
            <a href="{{ route('lokasi.index', ['desa' => $desa->nama_desa]) }}" class="category inline-block text-center">
            <p class="text-sm font-medium">{{ $desa->nama_desa }}</p>
        </a>
        @endforeach
    </div>

    <div class="py-3" id="reports">
        <div class="flex justify-between items-center">
            <h6 class="text-lg font-medium">Daftar Lokasi Pengungsian</h6>
            <a href="{{ route('lokasi.index') }}" class="text-blue-500 no-underline hover:underline">
                Lihat semua
            </a>
        </div>

        <div class="flex flex-col gap-4 mt-3">
            @foreach ( $lokasis as $lokasi )
                <div class="bg-white rounded-lg overflow-hidden shadow-sm">
                <a href="{{ route('lokasi.show', $lokasi->id) }}" class="no-underline text-gray-900">
                    <div class="p-0">
                        <div class="relative mb-2">
                            <img src="{{asset('storage/'. $lokasi->gambar_lokasi)}}" alt="" class="w-full h-48 object-cover">
                            

                            @if ($lokasi->statusLokasi->last()->status === 'pending')
                                <div class="absolute top-2 right-2 bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    Pending
                                </div>
                            @endif

                            @if ($lokasi->statusLokasi->last()->status === 'approved')
                                <div class="absolute top-2 right-2 bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    Disetujui
                                </div>
                            @endif

                            @if ($lokasi->statusLokasi->last()->status === 'rejected')
                                <div class="absolute top-2 right-2 bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    Ditolak
                                </div>
                            @endif

                            @if ($lokasi->statusLokasi->last()->status == 'done')
                                <div class="absolute top-2 right-2 bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    Done
                                </div>
                            @endif
                        </div>

                        <div class="flex justify-between items-end mb-2 px-4">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <p class="text-blue-500 text-sm">
                                    {{ $lokasi->alamat_lokasi }}
                                </p>
                            </div>

                            <p class="text-gray-500 text-sm">
                                {{ \Carbon\Carbon::parse($lokasi->created_at)->format('d M Y H:i') }}
                            </p>
                        </div>

                        <h1 class="text-xl font-bold px-4 pb-4">
                            {{ $lokasi->nama_lokasi }}
                        </h1>
                    </div>
                </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection --}}