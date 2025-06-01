@extends('layouts.admin')

@section('title', 'Data Relawan')

@section('content')
<div class="space-y-4">
    <a href="{{route('admin.relawan.create')}}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md mb-4 inline-block">
        Tambah Data Relawan
    </a>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h6 class="text-lg font-semibold text-gray-800">Daftar Data Relawan</h6>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200" id="dataTable">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Profil</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($relawans as $relawan)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$loop->iteration}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$relawan->user->email}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$relawan->user->name}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{asset('storage/'. $relawan->avatar)}}" alt="avatar" class="h-16 w-16 rounded-full object-cover">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <a href="{{route('admin.relawan.edit', $relawan->id)}}" class="text-yellow-600 hover:text-yellow-900 bg-yellow-100 hover:bg-yellow-200 px-3 py-1 rounded-md text-sm inline-block">
                                    Edit
                                </a>
                                <a href="{{route('admin.relawan.show', $relawan->id)}}" class="text-blue-600 hover:text-blue-900 bg-blue-100 hover:bg-blue-200 px-3 py-1 rounded-md text-sm inline-block">
                                    Show
                                </a>
                                <form action="{{route('admin.relawan.destroy', $relawan->id)}}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 bg-red-100 hover:bg-red-200 px-3 py-1 rounded-md text-sm">
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

@section('title', 'Data Relawan')

@section('content')
<a href="{{route('admin.relawan.create')}}" class="btn btn-primary mb-3">Tambah Data</a>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Data Relawan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>

                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Profil</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $relawans as $relawan )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$relawan->user->email}}</td>
                        <td>{{$relawan->user->name}}</td>
                        <td><img src="{{asset('storage/'. $relawan->avatar)}}" alt="avatar" width="100px"></td>
                        <td>
                            <a href="{{route('admin.relawan.edit', $relawan->id)}}" class="btn btn-warning">Edit</a>

                            <a href="{{route('admin.relawan.show', $relawan->id)}}" class="btn btn-info">Show</a>

                            <form action="{{route('admin.relawan.destroy', $relawan->id)}}" method="POST" class="d-inline">
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