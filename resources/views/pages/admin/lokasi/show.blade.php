@extends('layouts.admin')

@section('title', 'Detail Lokasi')

@section('content')
<div class="space-y-4">
    <!-- Back Button -->
    <a href="{{route('admin.lokasi.index')}}" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg shadow-md transition duration-200 mb-4">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>

    <!-- Detail Card -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Card Header Detail -->
        <div class="px-6 py-4 bg-gradient-to-r from-blue-500 to-blue-600">
            <h3 class="text-xl font-bold text-white">Detail Lokasi</h3>
        </div>
        
        <!-- Card Body Detail -->
        <div class="p-6">
            <div class="overflow-hidden border border-gray-200 rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Nama Desa
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{$lokasi->desa->nama_desa}}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50">
                                Nama Relawan
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{$lokasi->relawan->user->name}} - {{ $lokasi->relawan->user->email}} 
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Nama Lokasi
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{$lokasi->nama_lokasi}}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Alamat Lokasi
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{$lokasi->alamat_lokasi}}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Luas Lokasi
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{$lokasi->luas_lokasi}}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Kapasitas Pengungsi
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{$lokasi->kapasitas_pengungsi}}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Gambar Lokasi
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                <img src="{{asset('storage/'. $lokasi->gambar_lokasi)}}" alt="gambar_lokasi" class="h-16 w-16 rounded-full object-cover">
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Latitude
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{$lokasi->latitude}}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Longitude
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{$lokasi->longitude}}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Map
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                <div id="map" style="height: 400px;"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Sphere Card -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Card Header Sphere -->
        <div class="px-6 py-4 bg-gradient-to-r from-blue-500 to-blue-600">
            <h3 class="text-xl font-bold text-white">Kebutuhan Sphere Lokasi</h3>
        </div>
        
        <!-- Card Body Sphere-->
        <div class="p-6">
            <div class="overflow-hidden border border-gray-200 rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Air Hidup
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{$lokasi->sphereLokasi->air_hidup}}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50">
                                Air Kebersihan
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{$lokasi->sphereLokasi->air_kebersihan}}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Air Memasak
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{$lokasi->sphereLokasi->air_memasak}}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Toilet Jangka Pendek
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{$lokasi->sphereLokasi->toilet_pendek}}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Toilet Jangka Panjang
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{$lokasi->sphereLokasi->toilet_panjang}}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Kalori
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{$lokasi->sphereLokasi->kalori}}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Protein
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{$lokasi->sphereLokasi->protein}}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Lemak
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{$lokasi->sphereLokasi->lemak}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Status Card -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Card Header Status -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-semibold text-gray-800">Status lokasi</h3>
        </div>
        
        <!-- Card Body Status -->
        <div class="p-6">
            <div class="overflow-x-auto">
                <a href="{{route('admin.status-lokasi.create', $lokasi->id)}}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md mb-4 transition duration-200">
                    Progress Lokasi
                </a>
                <table class="min-w-full divide-y divide-gray-200" id="dataTable">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catatan</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($lokasi->statusLokasi as $status)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$loop->iteration}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$status->status}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$status->catatan}}</td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <a href="{{route('admin.status-lokasi.edit', $status->id)}}" class="inline-flex items-center px-3 py-1 bg-yellow-100 hover:bg-yellow-200 text-yellow-800 rounded-md text-sm">
                                    Edit
                                </a>
                                {{-- <a href="{{route('admin.status-lokasi.show', $status->id)}}" class="inline-flex items-center px-3 py-1 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded-md text-sm">
                                    Show
                                </a> --}}
                                <form action="{{route('admin.status-lokasi.destroy', $status->id)}}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-100 hover:bg-red-200 text-red-800 rounded-md text-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    var mymap = L.map('map').setView([{{$lokasi->latitude}}, {{$lokasi->longitude}}], 13);
    var marker = L.marker([{{$lokasi->latitude}}, {{$lokasi->longitude}}]).addTo(mymap);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap',
        maxZoom: 18
    }).addTo(mymap);

    marker.bindPopup("<b>{{$lokasi->nama_lokasi}}</b><br/>berada di {{$lokasi->alamat_lokasi}}").openPopup();
</script>
@endsection


{{-- @extends('layouts.admin')

@section('title', 'Detail Desa')

@section('content')
                    <!-- Page Heading -->
                    <a href="{{route('admin.desa.index')}}" class="btn btn-danger mb-3">Kembali</a>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Desa</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Nama Desa</td>
                                    <td>{{ $desa->nama_desa }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Desa</td>
                                    <td>{{ $desa->alamat_desa }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

@endsection --}}