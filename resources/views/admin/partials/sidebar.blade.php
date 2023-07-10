<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('dashboard')}}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('front/img/logo/logo-pethero.png') }}" width="30%" alt="">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 mb-5">
        <!-- Page -->
        <li class="menu-item {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
            <a href="{{route('dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master Data</span>
        </li>
        <li class="menu-item {{ request()->is('admin/kirim-hewan*') ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon bx bxs-data'></i>
                <div data-i18n="Account Settings">Kirim Hewan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin/kirim-hewan/konfirmasi-pembayaran*') ? 'active' : '' }}">
                    <a href="{{route('konfirmasi-pembayaran.index')}}" class="menu-link">
                      <div>Konfirmasi Pembayaran</div>
                  </a>
                </li>
                <li class="menu-item {{ request()->is('admin/kirim-hewan/berhasil*') ? 'active' : '' }}">
                    <a href="{{route('berhasil.index')}}" class="menu-link">
                      <div>Kirim Hewan</div>
                  </a>
                </li>
              </ul>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">User</span>
        </li>
        <li class="menu-item {{ request()->is('admin/user*') ? 'active' : '' }}">
            <a href="{{route('user.index')}}" class="menu-link">
                <i class='menu-icon bx bxs-user-circle'></i>
                <div>Member</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/kurir*') ? 'active' : '' }}">
            <a href="{{route('kurir.index')}}" class="menu-link">
                <i class='menu-icon bx bxs-user-circle'></i>
                <div>kurir</div>
            </a>
        </li>
    </ul>
</aside>
