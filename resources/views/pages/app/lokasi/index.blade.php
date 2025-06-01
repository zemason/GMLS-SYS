{{-- @extends('layouts.app')

@section('title', 'Daftar Lokasi')

@section('content')
<div class="py-3" id="reports">
    <div class="d-flex justify-content-between align-items-center">
        <p class="text-muted"> {{$lokasis -> count()}} Daftar Lokasi Pengungsian</p>

        <button class="btn btn-filter" type="button">
            <i class="fa-solid fa-filter me-2"></i>
            Filter
        </button>

    </div>

    @if(request()->desa) 
        <p>{{request()->desa}}</p>
    @endif

    <div class="d-flex flex-column gap-3 mt-3">
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
@endsection --}}

@extends('layouts.app')

@section('title', 'Daftar Lokasi')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2 md:mb-0">Daftar Lokasi Pengungsian</h1>
        
        <div class="flex items-center space-x-4">
            <span class="text-gray-600">{{ $lokasis->count() }} Lokasi Tersedia</span>
            
            @if(request()->desa)
            <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                {{ request()->desa }}
            </div>
            @endif
            
            <button class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 transition">
                <i class="fas fa-filter text-gray-500 mr-2"></i>
                <span>Filter</span>
            </button>
        </div>
    </div>

    <!-- Locations Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($lokasis as $lokasi)
        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition duration-300">
            <a href="{{ route('lokasi.show', $lokasi->id) }}" class="block">
                <!-- Image with Status Badge -->
                <div class="relative">
                    <img src="{{ asset('storage/'. $lokasi->gambar_lokasi) }}" 
                         alt="{{ $lokasi->nama_lokasi }}" 
                         class="w-full h-48 object-cover">
                    
                    <!-- Status Badge -->
                    @php $status = $lokasi->statusLokasi->last()?->status; @endphp
                    <div class="absolute top-3 right-3 px-3 py-1 rounded-full text-sm font-medium
                        @if($status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($status === 'approved') bg-green-100 text-green-800
                        @elseif($status === 'rejected') bg-red-100 text-red-800
                        @elseif($status === 'done') bg-purple-100 text-purple-800
                        @endif">
                        @if($status === 'pending') Pending
                        @elseif($status === 'approved') Disetujui
                        @elseif($status === 'rejected') Ditolak
                        @elseif($status === 'done') Selesai
                        @endif
                    </div>
                </div>

                <!-- Location Details -->
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $lokasi->nama_lokasi }}</h3>
                    
                    <div class="flex items-center text-gray-600 mb-3">
                        <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-sm">{{ $lokasi->alamat_lokasi }}</span>
                    </div>

                    <div class="flex justify-between items-center text-sm text-gray-500">
                        <span>{{ $lokasi->desa->nama_desa ?? '' }}</span>
                        <span>{{ \Carbon\Carbon::parse($lokasi->created_at)->format('d M Y H:i') }}</span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <!-- Empty State -->
    @if($lokasis->count() == 0)
    <div class="text-center py-12">
        <div class="mx-auto w-24 h-24 text-gray-400 mb-4">
            <i class="fas fa-map-marker-alt text-5xl"></i>
        </div>
        <h3 class="text-lg font-medium text-gray-900 mb-1">Tidak ada lokasi ditemukan</h3>
        <p class="text-gray-500">Silakan coba dengan filter yang berbeda</p>
    </div>
    @endif
</div>
@endsection