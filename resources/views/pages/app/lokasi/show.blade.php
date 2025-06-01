@extends('layouts.app')

@section('title', $lokasi->nama_lokasi)

@section('content')
<div class="container mx-auto px-4 py-6 max-w-3xl">
    <!-- Header Card -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-6">
        <div class="flex items-center">
            <a href="{{ route('home') }}" class="flex items-center text-blue-600 hover:text-blue-800 mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                <span class="ml-1">Kembali</span>
            </a>
            <h1 class="text-2xl font-bold text-gray-800">Detail Lokasi</h1>
        </div>
    </div>

    <!-- Image Card -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-6">
        <img src="{{ asset('storage/'. $lokasi->gambar_lokasi) }}" 
             alt="{{ $lokasi->nama_lokasi }}" 
             class="w-full h-64 object-cover">
        
        <!-- Status Badge -->
        <div class="p-4 border-t border-gray-100">
            @php $status = $lokasi->statusLokasi->last()?->status; @endphp
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                @if($status === 'pending') bg-yellow-100 text-yellow-800
                @elseif($status === 'approved') bg-green-100 text-green-800
                @elseif($status === 'rejected') bg-red-100 text-red-800
                @elseif($status === 'done') bg-blue-100 text-blue-800
                @endif">
                @if($status === 'pending')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Pending
                @elseif($status === 'approved')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Disetujui
                @elseif($status === 'rejected')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Ditolak
                @elseif($status === 'done')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Selesai
                @endif
            </span>
        </div>
    </div>

    <!-- Main Information Card -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">Informasi Lokasi</h2>
        
        <div class="space-y-4">
            <div class="flex items-center py-2">
                <span class="w-40 text-gray-600 font-medium">Nama Lokasi</span>
                <span class="text-gray-800">{{ $lokasi->nama_lokasi }}</span>
            </div>
            <div class="flex items-center py-2">
                <span class="w-40 text-gray-600 font-medium">Desa</span>
                <span class="text-gray-800">{{ $lokasi->desa->nama_desa }}</span>
            </div>
            <div class="flex items-center py-2">
                <span class="w-40 text-gray-600 font-medium">Tanggal</span>
                <span class="text-gray-800">{{ \Carbon\Carbon::parse($lokasi->created_at)->format('d M Y H:i') }}</span>
            </div>
            <div class="flex items-start py-2">
                <span class="w-40 text-gray-600 font-medium">Alamat</span>
                <span class="text-gray-800">{{ $lokasi->alamat_lokasi }}</span>
            </div>
            <div class="flex items-center py-2">
                <span class="w-40 text-gray-600 font-medium">Luas Lokasi</span>
                <span class="text-gray-800">{{ $lokasi->luas_lokasi }} m²</span>
            </div>
            <div class="flex items-center py-2">
                <span class="w-40 text-gray-600 font-medium">Kapasitas</span>
                <span class="text-gray-800">{{ $lokasi->kapasitas_pengungsi }} orang</span>
            </div>
        </div>
    </div>

    <!-- Sphere Requirements Card -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">Kebutuhan Sphere Minimum</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="space-y-4">
                <div class="flex items-center py-2">
                    <span class="w-40 text-gray-600 font-medium">Air Kebutuhan Hidup</span>
                    <span class="text-gray-800 font-medium">{{ $lokasi->sphereLokasi->air_hidup }} L/orang/hari</span>
                </div>
                <div class="flex items-center py-2">
                    <span class="w-40 text-gray-600 font-medium">Air Kebersihan</span>
                    <span class="text-gray-800 font-medium">{{ $lokasi->sphereLokasi->air_kebersihan }} L/orang/hari</span>
                </div>
                <div class="flex items-center py-2">
                    <span class="w-40 text-gray-600 font-medium">Air Memasak</span>
                    <span class="text-gray-800 font-medium">{{ $lokasi->sphereLokasi->air_memasak }} L/orang/hari</span>
                </div>
                <div class="flex items-center py-2">
                    <span class="w-40 text-gray-600 font-medium">Toilet Jangka Pendek</span>
                    <span class="text-gray-800 font-medium">{{ $lokasi->sphereLokasi->toilet_pendek }} per 20 orang</span>
                </div>
            </div>
            
            <div class="space-y-4">
                <div class="flex items-center py-2">
                    <span class="w-40 text-gray-600 font-medium">Toilet Jangka Panjang</span>
                    <span class="text-gray-800 font-medium">{{ $lokasi->sphereLokasi->toilet_panjang }} per 20 orang</span>
                </div>
                <div class="flex items-center py-2">
                    <span class="w-40 text-gray-600 font-medium">Kalori</span>
                    <span class="text-gray-800 font-medium">{{ $lokasi->sphereLokasi->kalori }} kkal/orang/hari</span>
                </div>
                <div class="flex items-center py-2">
                    <span class="w-40 text-gray-600 font-medium">Protein</span>
                    <span class="text-gray-800 font-medium">{{ $lokasi->sphereLokasi->protein }} g/orang/hari</span>
                </div>
                <div class="flex items-center py-2">
                    <span class="w-40 text-gray-600 font-medium">Lemak</span>
                    <span class="text-gray-800 font-medium">{{ $lokasi->sphereLokasi->lemak }} g/orang/hari</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Status History Card -->
    <div class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">Riwayat Status</h2>
        
        <div class="flow-root">
            <ul class="-mb-8">
                @foreach($lokasi->statusLokasi as $status)
                <li class="relative pb-8">
                    <div class="relative flex items-start space-x-3">
                        <div>
                            <div class="relative px-1">
                                <div class="h-8 w-8 bg-gray-100 rounded-full flex items-center justify-center">
                                    @if($status->status === 'approved')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    @elseif($status->status === 'rejected')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    @elseif($status->status === 'done')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="min-w-0 flex-1 py-0">
                            <div class="text-sm text-gray-500">
                                <span class="font-medium text-gray-900">{{ ucfirst($status->status) }}</span> - {{ \Carbon\Carbon::parse($status->created_at)->format('d M Y H:i') }}
                            </div>
                            <div class="mt-1 text-sm text-gray-700">
                                <p>{{ $status->catatan }}</p>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection