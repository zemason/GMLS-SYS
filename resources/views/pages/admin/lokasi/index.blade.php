@extends('layouts.admin')

@section('title', 'Data Lokasi')

@section('content')
<div class="space-y-4">
    <!-- Add Button -->
    <a href="{{route('admin.lokasi.create')}}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md mb-4 transition duration-200">
        Tambah Data lokasi
    </a>

    <!-- Data Card -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Card Header -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-semibold text-gray-800">Daftar Data lokasi</h3>
        </div>
        
        <!-- Card Body -->
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200" id="dataTable">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Desa</th>
                            {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Relawan</th> --}}
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lokasi</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat Lokasi</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar Lokasi</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($lokasis as $lokasi)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$loop->iteration}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$lokasi->desa->nama_desa}}</td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$lokasi->relawan->user->name}}</td> --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$lokasi->nama_lokasi}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$lokasi->alamat_lokasi}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{asset('storage/'. $lokasi->gambar_lokasi)}}" alt="gambar_lokasi" class="h-16 w-16 rounded-full object-cover">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <a href="{{route('admin.lokasi.edit', $lokasi->id)}}" class="inline-flex items-center px-3 py-1 bg-yellow-100 hover:bg-yellow-200 text-yellow-800 rounded-md text-sm">
                                    Edit
                                </a>
                                <a href="{{route('admin.lokasi.show', $lokasi->id)}}" class="inline-flex items-center px-3 py-1 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded-md text-sm">
                                    Show
                                </a>
                                <form action="{{route('admin.lokasi.destroy', $lokasi->id)}}" method="POST" class="inline">
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

{{-- @extends('layouts.admin')

@section('title', 'Data lokasi')

@section('content')
<a href="{{route('admin.lokasi.create')}}" class="btn btn-primary mb-3">Tambah Data lokasi</a>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Data lokasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama lokasi</th>
                        <th>Alamat lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $lokasis as $lokasi )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$lokasi->nama_lokasi}}</td>
                        <td>{{$lokasi->alamat_lokasi}}</td>
                        <td>
                            <a href="{{route('admin.lokasi.edit', $lokasi->id)}}" class="btn btn-warning">Edit</a>

                            <a href="{{route('admin.lokasi.show', $lokasi->id)}}" class="btn btn-info">Show</a>

                            <form action="{{route('admin.lokasi.destroy', $lokasi->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection --}}