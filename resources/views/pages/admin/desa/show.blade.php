@extends('layouts.admin')

@section('title', 'Detail Desa')

@section('content')
<div class="space-y-4">
    <!-- Back Button -->
    <a href="{{route('admin.desa.index')}}" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg shadow-md transition duration-200 mb-4">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>

    <!-- Detail Card -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Card Header -->
        <div class="px-6 py-4 bg-gradient-to-r from-blue-500 to-blue-600">
            <h3 class="text-xl font-bold text-white">Detail Desa</h3>
        </div>
        
        <!-- Card Body -->
        <div class="p-6">
            <div class="overflow-hidden border border-gray-200 rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50 w-1/4">
                                Nama Desa
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{ $desa->nama_desa }}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50">
                                Alamat Desa
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $desa->alamat_desa }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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