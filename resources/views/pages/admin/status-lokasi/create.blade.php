@extends('layouts.admin')

@section('title', 'Tambah Data Progress')

@section('content')
<div class="space-y-4">
    <!-- Back Button -->
    <a href="{{route('admin.lokasi.index')}}" class="inline-block bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md mb-4 transition duration-200">
        Kembali
    </a>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Card Header -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-semibold text-gray-800">Tambah Data Progress Lokasi</h3>
        </div>
        
        <!-- Card Body -->
        <div class="p-6">
            <form action="{{route('admin.status-lokasi.store')}}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="lokasi_id" value="{{$lokasi->id}}">
                
                <!-- Status Field -->
                <div class="space-y-2">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select 
                        name="status" 
                        id="status"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('desa_id') border-red-500 @enderror"
                    >        
                            <option value="pending" @if (old('status') == 'pending') selected @endif
                                >Pending
                            </option>
                            <option value="approved" @if (old('status') == 'approved') selected @endif
                                >Approved
                            </option>
                            <option value="rejected" @if (old('status') == 'rejected') selected @endif
                                >Rejected
                            </option>
                            <option value="done" @if (old('status') == 'done') selected @endif
                                >Done
                            </option>
                    </select>

                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Catatan Field -->
                <div class="space-y-2">
                    <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
                    <input type="text" id="catatan" name="catatan" value="{{old('catatan')}}"
                        class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('catatan') border-red-500 @enderror">
                        </input>
                    @error('catatan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition duration-200">
                    Simpan Data
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

{{-- @extends('layouts.admin')

@section('title', 'Tambah Data Desa')

@section('content')
<!-- Page Heading -->
<a href="{{route('admin.desa.index')}}" class="btn btn-danger mb-3">Kembali</a>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin.desa.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_desa">Nama Desa</label>
                <input type="text" class="form-control @error('nama_desa') is-invalid @enderror" 
                id="nama_desa" name="nama_desa" value="{{old('nama_desa')}}">

                @error('nama_desa')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat_desa">Alamat Desa</label>
                <input type="text" class="form-control @error('alamat_desa') is-invalid @enderror" 
                id="alamat_desa" name="alamat_desa" value="{{old('alamat_desa')}}">

                @error('alamat_desa')
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