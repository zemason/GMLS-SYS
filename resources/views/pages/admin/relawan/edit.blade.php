@extends('layouts.admin')

@section('title', 'Edit Data Relawan')

@section('content')
<div class="space-y-4">
    <!-- Back Button -->
    <a href="{{route('admin.relawan.index')}}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md inline-block">
        Kembali
    </a>

    <!-- Form Card -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <!-- Card Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <h6 class="text-lg font-semibold text-gray-800">Edit Data</h6>
        </div>
        
        <!-- Card Body -->
        <div class="p-6">
            <form action="{{route('admin.relawan.update', $relawan->id)}}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md @error('name') border-red-500 @enderror" 
                        id="name" name="name" value="{{old('name', $relawan->user->name)}}">
                    @error('name')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" class="w-full px-3 py-2 border rounded-md bg-gray-100 @error('email') border-red-500 @enderror" 
                        id="email" name="email" value="{{old('email', $relawan->user->email)}}" readonly>
                    @error('email')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password (Kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" class="w-full px-3 py-2 border rounded-md @error('password') border-red-500 @enderror" 
                        id="password" name="password">
                    @error('password')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                <!-- Avatar Field -->
                <div class="space-y-2">
                    <label for="avatar" class="block text-sm font-medium text-gray-700">Profil</label>
                    <div class="flex items-center space-x-4">
                        @if($relawan->avatar)
                            <img src="{{asset('storage/'.$relawan->avatar)}}" alt="Current Avatar" class="h-16 w-16 rounded-full object-cover">
                        @endif
                        <input type="file" class="w-full px-3 py-2 border rounded-md @error('avatar') border-red-500 @enderror" 
                            id="avatar" name="avatar">
                    </div>
                    @error('avatar')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

{{-- @extends('layouts.admin')

@section('title', 'Edit Data Relawan')

@section('content')
<!-- Page Heading -->
<a href="{{route('admin.relawan.index')}}" class="btn btn-danger mb-3">Kembali</a>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin.relawan.update', $relawan->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                id="name" name="name" value="{{old('name', $relawan->user->name)}}">

                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                id="email" name="email" value="{{old('email', $relawan->user->email)}}" readonly>

                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                id="password" name="password" >

                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="avatar">Proil</label>
                <input type="file" class="form-control @error('avatar') is-invalid @enderror" 
                id="avatar" name="avatar">

                @error('avatar')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection --}}