@extends('layouts.admin')

@section('title', 'Edit Data Lokasi')

@section('content')
<div class="space-y-4">
    <!-- Back Button -->
    <a href="{{route('admin.lokasi.index')}}" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md transition duration-200">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Card Header -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-semibold text-gray-800">Edit Data Lokasi</h3>
        </div>
        
        <!-- Card Body -->
        <div class="p-6">
            <form action="{{route('admin.lokasi.update', $lokasi->id)}}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nama Desa Field -->
                <div class="space-y-2">
                    <label for="desa_id" class="block text-sm font-medium text-gray-700">Nama Desa</label>
                    <select 
                        name="desa_id" 
                        id="desa_id"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('desa_id') border-red-500 @enderror"
                    >
                        @foreach ($desas as $desa)
                            <option value="{{$desa->id}}" @if (old('desa_id', $lokasi->desa_id) == $desa->id) selected @endif
                                >{{$desa->nama_desa}}
                            </option>
                        @endforeach
                    </select>
    
                    @error('desa_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <!-- Nama Relawan Field -->
                <div class="space-y-2">
                    <label for="relawan_id" class="block text-sm font-medium text-gray-700">Nama Relawan</label>
                    <select 
                        name="relawan_id" 
                        id="relawan_id"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('relawan_id') border-red-500 @enderror"
                    >
                        @foreach ($relawans as $relawan)
                            <option value="{{$relawan->id}}" @if (old('relawan_id', $lokasi->relawan_id) == $relawan->id) selected @endif
                                >{{$relawan->user->name}} - {{$relawan->user->email}}
                            </option>
                        @endforeach
                    </select>
    
                    @error('relawan_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <!-- Nama Lokasi Field -->
                <div class="space-y-2">
                    <label for="nama_lokasi" class="block text-sm font-medium text-gray-700">Nama Lokasi</label>
                    <input type="text" id="nama_lokasi" name="nama_lokasi" value="{{old('nama_lokasi', $lokasi->nama_lokasi)}}"
                        class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nama_lokasi') border-red-500 @enderror">
                    @error('nama_lokasi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat Lokasi Field -->
                <div class="space-y-2">
                    <label for="alamat_lokasi" class="block text-sm font-medium text-gray-700">Alamat Lokasi</label>
                    <input type="text" id="alamat_lokasi" name="alamat_lokasi" value="{{old('alamat_lokasi', $lokasi->alamat_lokasi)}}"
                        class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('alamat_lokasi') border-red-500 @enderror">
                    @error('alamat_lokasi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Panjang Lokasi Field -->
                <div class="space-y-2">
                    <label for="panjang" class="block text-sm font-medium text-gray-700">Panjang Lokasi (meter)</label>
                    <input type="number" step="0.01" id="panjang" name="panjang" value="{{old('panjang', $lokasi->panjang)}}"
                        class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('panjang') border-red-500 @enderror"
                        oninput="hitungSemua()">
                    @error('panjang')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lebar Lokasi Field -->
                <div class="space-y-2">
                    <label for="lebar" class="block text-sm font-medium text-gray-700">Lebar Lokasi (meter)</label>
                    <input type="number" step="0.01" id="lebar" name="lebar" value="{{old('lebar', $lokasi->lebar)}}"
                        class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('lebar') border-red-500 @enderror"
                        oninput="hitungSemua()">
                    @error('lebar')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Luas Lokasi Field -->
                <div class="space-y-2">
                    <label for="luas_lokasi" class="block text-sm font-medium text-gray-700">Luas Lokasi (m²)</label>
                    <input type="number" step="0.01" id="luas_lokasi" name="luas_lokasi" value="{{old('luas_lokasi', $lokasi->luas_lokasi)}}"
                        class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-100 @error('luas_lokasi') border-red-500 @enderror"
                        readonly>
                    @error('luas_lokasi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kapasitas Pengungsi Field -->
                <div class="space-y-2">
                    <label for="kapasitas_pengungsi" class="block text-sm font-medium text-gray-700">Kapasitas Lokasi (orang)</label>
                    <input type="number" id="kapasitas_pengungsi" name="kapasitas_pengungsi" value="{{old('kapasitas_pengungsi', $lokasi->kapasitas_pengungsi)}}"
                        class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-100 @error('kapasitas_pengungsi') border-red-500 @enderror"
                        readonly>
                    @error('kapasitas_pengungsi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500 mt-1">*Dihitung dari luas lokasi dibagi 3.5 m² per orang</p>
                </div>

                <!-- Gambar Lokasi Field -->
                <div class="space-y-2">
                    <label for="gambar_lokasi" class="block text-sm font-medium text-gray-700">Gambar Lokasi</label>
                    <img src="{{asset ('storage/'. $lokasi->gambar_lokasi)}}" alt="gambar_lokasi" width="100">
                    <input type="file" id="gambar_lokasi" name="gambar_lokasi" value="{{old('gambar_lokasi')}}"
                        class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('gambar_lokasi') border-red-500 @enderror">
                    @error('gambar_lokasi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- latitude Lokasi Field -->
                <div class="space-y-2">
                    <label for="latitude" class="block text-sm font-medium text-gray-700">Koordinat Lokasi (latitude)</label>
                    <input type="text" id="latitude" name="latitude" value="{{old('latitude', $lokasi->latitude)}}"
                        class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('latitude') border-red-500 @enderror">
                    @error('latitude')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- longitude Lokasi Field -->
                <div class="space-y-2">
                    <label for="longitude" class="block text-sm font-medium text-gray-700">Koordinat Lokasi (longitude)</label>
                    <input type="text" id="longitude" name="longitude" value="{{old('longitude', $lokasi->longitude)}}"
                        class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('longitude') border-red-500 @enderror">
                    @error('longitude')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Card Kebutuhan Sphere Pra Bencana -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mt-6">
                    <!-- Card Header -->
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                        <h3 class="text-lg font-semibold text-gray-800">Kebutuhan Sphere Pra Bencana</h3>
                        <p class="text-sm text-gray-500 mt-1">Perhitungan Berdasarkan Standar Proyek Sphere</p>
                    </div>
                    
                    <!-- Card Body -->
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Air Kebutuhan Hidup -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Air Kebutuhan Hidup</label>
                                <div class="relative">
                                    <input type="number" id="air_hidup" name="air_hidup" value="{{old('air_hidup', $lokasi->sphere->air_hidup ?? 0)}}" readonly
                                        class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100 @error('air_hidup') border-red-500 @enderror">
                                    @error('air_hidup')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <span class="absolute right-3 top-2 text-gray-500">liter/hari</span>
                                </div>
                                <p class="text-xs text-gray-500">3 liter/orang/hari</p>
                            </div>

                            <!-- Air Kebersihan -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Air Kebersihan</label>
                                <div class="relative">
                                    <input type="number" id="air_kebersihan" name="air_kebersihan" value="{{old('air_kebersihan', $lokasi->sphere->air_kebersihan ?? 0)}}" readonly
                                        class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100 @error('air_kebersihan') border-red-500 @enderror">
                                    @error('air_kebersihan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <span class="absolute right-3 top-2 text-gray-500">liter/hari</span>
                                </div>
                                <p class="text-xs text-gray-500">6 liter/orang/hari</p>
                            </div>

                            <!-- Air untuk Memasak -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Air untuk Memasak</label>
                                <div class="relative">
                                    <input type="number" id="air_memasak" name="air_memasak" value="{{old('air_memasak', $lokasi->sphere->air_memasak ?? 0)}}" readonly
                                        class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100 @error('air_memasak') border-red-500 @enderror">
                                    @error('air_memasak')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <span class="absolute right-3 top-2 text-gray-500">liter/hari</span>
                                </div>
                                <p class="text-xs text-gray-500">6 liter/orang/hari</p>
                            </div>

                            <!-- Toilet Jangka Pendek -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Toilet Jangka Pendek</label>
                                <div class="relative">
                                    <input type="number" id="toilet_pendek" name="toilet_pendek" value="{{old('toilet_pendek', $lokasi->sphere->toilet_pendek ?? 0)}}" readonly
                                        class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100 @error('toilet_pendek') border-red-500 @enderror">
                                    @error('toilet_pendek')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <span class="absolute right-3 top-2 text-gray-500">unit</span>
                                </div>
                                <p class="text-xs text-gray-500">1 toilet per 20 orang</p>
                            </div>

                            <!-- Toilet Jangka Panjang -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Toilet Jangka Panjang</label>
                                <div class="relative">
                                    <input type="number" id="toilet_panjang" name="toilet_panjang" value="{{old('toilet_panjang', $lokasi->sphere->toilet_panjang ?? 0)}}" readonly
                                        class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100 @error('toilet_panjang') border-red-500 @enderror">
                                    @error('toilet_panjang')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <span class="absolute right-3 top-2 text-gray-500">unit</span>
                                </div>
                                <p class="text-xs text-gray-500">1 toilet per 50 orang</p>
                            </div>

                            <!-- Kalori per Hari -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Kalori per Hari</label>
                                <div class="relative">
                                    <input type="number" id="kalori" name="kalori" value="{{old('kalori', $lokasi->sphere->kalori ?? 0)}}" readonly
                                        class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100 @error('kalori') border-red-500 @enderror">
                                    @error('kalori')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <span class="absolute right-3 top-2 text-gray-500">kCal/hari</span>
                                </div>
                                <p class="text-xs text-gray-500">2100 kCal/orang/hari</p>
                            </div>

                            <!-- Protein per Hari -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Protein per Hari</label>
                                <div class="relative">
                                    <input type="number" id="protein" name="protein" value="{{old('protein', $lokasi->sphere->protein ?? 0)}}" readonly
                                        class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100 @error('protein') border-red-500 @enderror">
                                    @error('protein')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <span class="absolute right-3 top-2 text-gray-500">gram/hari</span>
                                </div>
                                <p class="text-xs text-gray-500">53 gram/orang/hari</p>
                            </div>

                            <!-- Lemak per Hari -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Lemak per Hari</label>
                                <div class="relative">
                                    <input type="number" id="lemak" name="lemak" value="{{old('lemak', $lokasi->sphere->lemak ?? 0)}}" readonly
                                        class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100 @error('lemak') border-red-500 @enderror">
                                    @error('lemak')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <span class="absolute right-3 top-2 text-gray-500">gram/hari</span>
                                </div>
                                <p class="text-xs text-gray-500">40 gram/orang/hari</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition duration-200">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

    {{-- <!-- Card Kebutuhan Sphere Pra Bencana -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mt-6">
        <!-- Card Header -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-semibold text-gray-800">Kebutuhan Sphere Pra Bencana</h3>
            <p class="text-sm text-gray-500 mt-1">Perhitungan berdasarkan standar Sphere untuk pengungsian</p>
        </div>
        
        <!-- Card Body -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Air Kebutuhan Hidup -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Air Kebutuhan Hidup</label>
                    <div class="relative">
                        <input type="text" id="air_hidup" readonly
                            class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100">
                        <span class="absolute right-3 top-2 text-gray-500">liter/hari</span>
                    </div>
                    <p class="text-xs text-gray-500">3 liter/orang/hari</p>
                </div>

                <!-- Air Kebersihan -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Air Kebersihan</label>
                    <div class="relative">
                        <input type="text" id="air_kebersihan" readonly
                            class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100">
                        <span class="absolute right-3 top-2 text-gray-500">liter/hari</span>
                    </div>
                    <p class="text-xs text-gray-500">6 liter/orang/hari</p>
                </div>

                <!-- Air untuk Memasak -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Air untuk Memasak</label>
                    <div class="relative">
                        <input type="text" id="air_memasak" readonly
                            class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100">
                        <span class="absolute right-3 top-2 text-gray-500">liter/hari</span>
                    </div>
                    <p class="text-xs text-gray-500">6 liter/orang/hari</p>
                </div>

                <!-- Toilet Jangka Pendek -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Toilet Jangka Pendek</label>
                    <div class="relative">
                        <input type="text" id="toilet_pendek" readonly
                            class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100">
                        <span class="absolute right-3 top-2 text-gray-500">unit</span>
                    </div>
                    <p class="text-xs text-gray-500">1 toilet per 20 orang</p>
                </div>

                <!-- Toilet Jangka Panjang -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Toilet Jangka Panjang</label>
                    <div class="relative">
                        <input type="text" id="toilet_panjang" readonly
                            class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100">
                        <span class="absolute right-3 top-2 text-gray-500">unit</span>
                    </div>
                    <p class="text-xs text-gray-500">1 toilet per 50 orang</p>
                </div>

                <!-- Kalori per Hari -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Kalori per Hari</label>
                    <div class="relative">
                        <input type="text" id="kalori" readonly
                            class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100">
                        <span class="absolute right-3 top-2 text-gray-500">kCal/hari</span>
                    </div>
                    <p class="text-xs text-gray-500">2100 kCal/orang/hari</p>
                </div>

                <!-- Protein per Hari -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Protein per Hari</label>
                    <div class="relative">
                        <input type="text" id="protein" readonly
                            class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100">
                        <span class="absolute right-3 top-2 text-gray-500">gram/hari</span>
                    </div>
                    <p class="text-xs text-gray-500">53 gram/orang/hari</p>
                </div>

                <!-- Lemak per Hari -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Lemak per Hari</label>
                    <div class="relative">
                        <input type="text" id="lemak" readonly
                            class="w-full px-3 py-2 border rounded-md shadow-sm bg-gray-100">
                        <span class="absolute right-3 top-2 text-gray-500">gram/hari</span>
                    </div>
                    <p class="text-xs text-gray-500">40 gram/orang/hari</p>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<script>
    function hitungSemua() {
        // Hitung luas dan kapasitas terlebih dahulu
        const panjang = parseFloat(document.getElementById('panjang').value) || 0;
        const lebar = parseFloat(document.getElementById('lebar').value) || 0;
        
        // Hitung luas
        const luas = panjang * lebar;
        document.getElementById('luas_lokasi').value = luas.toFixed(2);
        
        // Hitung kapasitas
        const kapasitas = Math.round(luas / 3.5);
        document.getElementById('kapasitas_pengungsi').value = kapasitas;

        // Hitung kebutuhan Sphere
        hitungKebutuhanSphere(kapasitas);
    }

    function hitungKebutuhanSphere(kapasitas) {
        // Air Kebutuhan Hidup (3 liter/orang/hari)
        const airHidup = 3 * kapasitas;
        document.getElementById('air_hidup').value = airHidup.toFixed(0);

        // Air Kebersihan (6 liter/orang/hari)
        const airKebersihan = 6 * kapasitas;
        document.getElementById('air_kebersihan').value = airKebersihan.toFixed(0);

        // Air untuk Memasak (6 liter/orang/hari)
        const airMemasak = 6 * kapasitas;
        document.getElementById('air_memasak').value = airMemasak.toFixed(0);

        // Toilet Jangka Pendek (1:20)
        const toiletPendek = Math.ceil(kapasitas / 20);
        document.getElementById('toilet_pendek').value = toiletPendek;

        // Toilet Jangka Panjang (1:50)
        const toiletPanjang = Math.ceil(kapasitas / 50);
        document.getElementById('toilet_panjang').value = toiletPanjang;

        // Kalori per Hari (2100 kCal/orang/hari)
        const kalori = 2100 * kapasitas;
        document.getElementById('kalori').value = kalori.toFixed(0);

        // Protein per Hari (53 g/orang/hari)
        const protein = 53 * kapasitas;
        document.getElementById('protein').value = protein.toFixed(0);

        // Lemak per Hari (40 g/orang/hari)
        const lemak = 40 * kapasitas;
        document.getElementById('lemak').value = lemak.toFixed(0);
    }
    
    // Panggil fungsi saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        // Hitung nilai awal dari data yang ada
        const kapasitas = parseInt(document.getElementById('kapasitas_pengungsi').value) || 0;
        hitungKebutuhanSphere(kapasitas);
    });
</script>
@endsection

{{-- @extends('layouts.admin')

@section('title', 'Edit Data Desa')

@section('content')
<!-- Page Heading -->
<a href="{{route('admin.desa.index')}}" class="btn btn-danger mb-3">Kembali</a>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin.desa.update', $desa->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_desa">Nama Desa</label>
                <input type="text" class="form-control @error('nama_desa') is-invalid @enderror" 
                id="nama_desa" name="nama_desa" value="{{old('nama_desa', $desa->nama_desa)}}">

                @error('alamat_desa')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat_desa">Alamat Desa</label>
                <input type="text" class="form-control @error('alamat_desa') is-invalid @enderror" 
                id="alamat_desa" name="alamat_desa" value="{{old('alamat_desa', $desa->alamat_desa)}}">

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