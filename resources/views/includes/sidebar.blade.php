<ul class="flex flex-col h-full bg-gradient-to-b from-blue-600 to-blue-800 text-white w-64 space-y-2 p-4">
    {{-- from-blue-600 to-blue-800, [#ee5350] to-[#d84845] --}}
    <!-- Sidebar - Brand -->
    <a class="flex items-center py-4 mb-2" href="index.html">
    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center overflow-hidden">
        <img src="/storage/logo/logogmls.png" alt="GMLS Logo" class="h-20 w-20 rounded-full object-contain">
    </div>
    <div class="ml-4 text-xl font-bold">GMLS-SYS</div>
    </a>
    <!-- Divider -->
    <hr class="border-gray-400 my-2">

    <!-- Nav Item - Dashboard -->
    <li class="rounded-lg {{request()->is('admin/dashboard') ? 'bg-blue-900' : 'hover:bg-blue-700'}}">
        {{-- 'bg-blue-900' : 'hover:bg-blue-700', bg-[#ee5350]' : 'hover:bg-[#e04a47] --}}
        <a class="flex items-center p-3" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt w-6"></i>
            <span class="ml-3">Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="rounded-lg {{request()->is('admin/relawan*') ? 'bg-blue-900' : 'hover:bg-blue-700'}}">
        {{-- 'bg-blue-900' : 'hover:bg-blue-700' --}}
        <a class="flex items-center p-3" href="{{route('admin.relawan.index')}}">
            <i class="fas fa-fw fa-user w-6"></i>
            <span class="ml-3">Data Relawan</span>
        </a>
    </li>
    
    <li class="rounded-lg {{request()->is('admin/desa*') ? 'bg-blue-900' : 'hover:bg-blue-700'}}">
        {{-- 'bg-blue-900' : 'hover:bg-blue-700' --}}
        <a class="flex items-center p-3" href="{{route('admin.desa.index')}}">
            <i class="fas fa-fw fa-building w-6"></i>
            <span class="ml-3">Data Desa</span>
        </a>
    </li>

    <li class="rounded-lg {{request()->is('admin/lokasi*') ? 'bg-blue-900' : 'hover:bg-blue-700'}}">
        {{-- 'bg-blue-900' : 'hover:bg-blue-700' --}}
        <a class="flex items-center p-3" href="{{route('admin.lokasi.index')}}">
            <i class="fas fa-fw fa-map w-6"></i>
            <span class="ml-3">Data Lokasi</span>
        </a>
    </li>


    
</ul>

{{-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GMLS-SYS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{request()->is('admin/dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{request()->is('admin/relawan*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.relawan.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Relawan</span></a>
    </li>
    <li class="nav-item {{request()->is('admin/desa*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.desa.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Desa</span></a>
    </li>


</ul> --}}