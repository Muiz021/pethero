<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('front/img/logo/logo.png ') }}" width="50" alt="">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">admin</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 mb-5">
        <!-- Page -->
        <li class="menu-item">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master Data</span>
        </li>
        <li class="menu-item {{ request()->is('admin/profil-sekolah') ? 'active' : '' }}">
            <a href="{{ url('admin/profil-sekolah') }}" class="menu-link">
                <i class='menu-icon bx bxs-school'></i>
                <div>Profil Sekolah</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/profil-kepala-sekolah') ? 'active' : '' }}">
            <a href="{{ url('admin/profil-kepala-sekolah') }}" class="menu-link">
                <i class='menu-icon bx bxs-user'></i>
                <div>Profil Kepala Sekolah</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/visi-dan-misi') ? 'active' : '' }}">
            <a href="{{url('admin/visi-dan-misi')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div>Visi dan Misi</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Klien</span>
        </li>
        <li class="menu-item {{ request()->is('admin/guru*') ? 'active' : '' }}">
            <a href="{{ route('guru.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-user-circle'></i>
                <div>Guru</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/user*') ? 'active' : '' }}">
            <a href="{{ route('user.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-user-circle'></i>
                <div>User</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Berita</span>
        </li>
        <li class="menu-item {{ request()->is('admin/berita') ? 'active' : '' }}">
            <a href="{{ route('berita.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-news'></i>
                <div>Berita</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">PPDB</span>
        </li>
        <li class="menu-item {{ request()->is('admin/ppdb') ? 'active' : '' }}">
            <a href="{{ route('ppdb.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-news'></i>
                <div>PPDB</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Web Setting</span>
        </li>
        <li class="menu-item {{ request()->is('admin/slider*') ? 'active' : '' }}">
            <a href="{{ route('slider.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-news'></i>
                <div>Slider Home</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/galeri*') ? 'active' : '' }}">
            <a href="{{ route('galeri.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-news'></i>
                <div>Galeri Kegiatan</div>
            </a>
        </li>
    </ul>
</aside>
