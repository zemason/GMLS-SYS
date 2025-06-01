@extends('layouts.admin')

@section('title', 'Detail Relawan')

@section('content')
<div class="space-y-4">
    <!-- Back Button -->
    <a href="{{route('admin.relawan.index')}}" class="inline-block bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md mb-4 transition duration-200">
        Kembali
    </a>

    <!-- Detail Card -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Card Header -->
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Detail Relawan</h3>
        </div>
        
        <!-- Card Body -->
        <div class="p-6">
            <div class="overflow-hidden border border-gray-200 rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50">Nama</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $relawan->user->name }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50">Email</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $relawan->user->email }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-50">Foto Profil</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{asset('storage/'. $relawan->avatar)}}" alt="avatar" class="h-32 w-32 object-cover rounded-md shadow-sm">
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

@section('title', 'Detail Relawan')

@section('content')
                    <!-- Page Heading -->
                    <a href="{{route('admin.relawan.index')}}" class="btn btn-danger mb-3">Kembali</a>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Relawan</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ $relawan->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $relawan->user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Foto Profil</td>
                                    <td>
                                        <img src="{{asset('storage/'. $relawan->avatar)}}" alt="avatar" width="200px">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

@endsection --}}