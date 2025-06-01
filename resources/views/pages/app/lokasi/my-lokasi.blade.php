@extends('layouts.app')

@section('title', 'Lokasi Saya')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Tabs Navigation -->
    <div class="border-b border-gray-200 mb-6">
        <nav class="flex flex-wrap justify-center gap-x-8 gap-y-2" aria-label="Tabs">
            <a href="{{url()->current() . '?status=pending'}}" 
               class="{{request('status') === 'pending' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'}} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Pending
            </a>
            <a href="{{url()->current() . '?status=approved'}}" 
               class="{{request('status') === 'approved' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'}} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Approved
            </a>
            <a href="{{url()->current() . '?status=rejected'}}" 
               class="{{request('status') === 'rejected' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'}} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Rejected
            </a>
            <a href="{{url()->current() . '?status=done'}}" 
               class="{{request('status') === 'done' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'}} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                Done
            </a>
        </nav>
    </div>

    <!-- Locations Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($lokasis as $lokasi)
        <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
            <a href="{{ route('lokasi.show', $lokasi->id) }}" class="block no-underline text-gray-900 hover:text-gray-900">
                <div class="relative">
                    <img src="{{asset('storage/'. $lokasi->gambar_lokasi)}}" alt="{{ $lokasi->nama_lokasi }}" 
                         class="w-full h-56 object-cover">
                    
                    <!-- Status Badge -->
                    @if ($lokasi->statusLokasi->last()?->status === 'pending')
                        <div class="absolute top-3 right-3 bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                            Pending
                        </div>
                    @elseif ($lokasi->statusLokasi->last()?->status === 'approved')
                        <div class="absolute top-3 right-3 bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                            Disetujui
                        </div>
                    @elseif ($lokasi->statusLokasi->last()?->status === 'rejected')
                        <div class="absolute top-3 right-3 bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                            Ditolak
                        </div>
                    @elseif ($lokasi->statusLokasi->last()?->status == 'done')
                        <div class="absolute top-3 right-3 bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                            Selesai
                        </div>
                    @endif
                </div>

                <div class="p-5">
                    <h3 class="text-xl font-bold mb-2 line-clamp-1">{{ $lokasi->nama_lokasi }}</h3>
                    
                    <div class="flex items-start text-gray-600 mb-3">
                        <svg class="w-5 h-5 mt-0.5 mr-2 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="line-clamp-2">{{ $lokasi->alamat_lokasi }}</span>
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
@endsection