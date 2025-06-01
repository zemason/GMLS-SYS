<!-- Bottom Navigation -->
<nav class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 flex justify-around items-center py-2 px-4 z-10 shadow-md">
    <!-- Home -->
    <a href="{{route('home')}}" class="flex flex-col items-center text-gray-600 hover:text-blue-600 px-2 py-1 rounded-lg transition-colors duration-200">
        <i class="fas fa-house text-xl"></i>
        <span class="text-xs mt-1">Beranda</span>
    </a>
    
    <!-- My Reports -->
    <a href="{{route('lokasi.mylokasi', ['status' => 'pending'])}}"  class="flex flex-col items-center text-gray-600 hover:text-blue-600 px-2 py-1 rounded-lg transition-colors duration-200">
        <i class="fas fa-clipboard-list text-xl"></i>
        <span class="text-xs mt-1">Laporanmu</span>
    </a>
    
    <!-- Tambah Desa FAB -->

    <a href="{{route('lokasi.create')}}" class="flex flex-col items-center text-gray-600 hover:text-blue-600 px-2 py-1 rounded-lg transition-colors duration-200">
        <i class="fas fa-map-marker-alt text-xl"></i>
        <span class="text-xs mt-1">Tambah Lokasi</span>
    </a>

    
    {{-- <!-- Notifications -->
    <a href="" class="flex flex-col items-center text-gray-600 hover:text-blue-600 px-2 py-1 rounded-lg transition-colors duration-200">
        <i class="fas fa-bell text-xl"></i>
        <span class="text-xs mt-1">Notifikasi</span>
    </a> --}}
    
    <!-- Profile -->
    @auth
        <a href="{{route('profile')}}" class="flex flex-col items-center text-gray-600 hover:text-blue-600 px-2 py-1 rounded-lg transition-colors duration-200">
            <i class="fas fa-user text-xl"></i>
            <span class="text-xs mt-1">Profil</span>
        </a>
    @else
        <a href="{{route('register')}}" class="flex flex-col items-center text-gray-600 hover:text-blue-600 px-2 py-1 rounded-lg transition-colors duration-200">
            <i class="fas fa-right-to-bracket text-xl"></i>
            <span class="text-xs mt-1">Daftar</span>
        </a>
    @endauth
</nav>

{{-- <div class="floating-button-container d-flex" onclick="window.location.href = 'take.html'">
        <button class="floating-button">
            <i class="fa-solid fa-camera"></i>
        </button>
    </div>
    <nav class="nav-mobile d-flex">
        <a href="index.html" class="active">
            <i class="fas fa-house"></i>
            Beranda
        </a>
        <a href="my-reports.html" class="">
            <i class="fas fa-solid fa-clipboard-list"></i>
            Laporanmu
        </a>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <a href="" class="">
            <i class="fas fa-bell"></i>
            Notifikasi
        </a>
        <a href="profile.html" class="">
            <i class="fas fa-user"></i>
            Profil
        </a>
    </nav> --}}