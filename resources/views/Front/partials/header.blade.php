@if (request()->is('akun*'))
<header class="fixed-top header-1">
    <div class="container">
        <div class="row">
            <div class="col">
                @if (request()->is('akun'))
                <h3 class="mt-3">Akun</h3>
                @endif

                @if (request()->is('akun/daftar'))
                <div class="d-flex mt-3">
                   <a href="{{route('front.akun')}}" class="me-3 my-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                      </svg>
                   </a>
                    <h3 class="my-auto">Daftar</h3>
                </div>
                @endif

                @if (request()->is('akun/masuk'))
                <div class="d-flex mt-3">
                   <a href="{{route('front.akun')}}" class="me-3 my-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                      </svg>
                   </a>
                    <h3 class="my-auto">Masuk</h3>
                </div>
                @endif

             @if (Auth::user())
             @if (request()->is('akun/'.Auth::user()->slug.'/edit'))
             <div class="d-flex mt-3">
                <a href="{{route('front.akun')}}" class="me-3 my-auto">
                 <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                   </svg>
                </a>
                 <h3 class="my-auto">Edit</h3>
             </div>
             @endif
             @endif

                @if (request()->is('akun/tentang-kami'))
                <div class="d-flex mt-3">
                   <a href="{{route('front.akun')}}" class="me-3 my-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                      </svg>
                   </a>
                    <h3 class="my-auto">Tentang Kami</h3>
                </div>
                @endif

                @if (request()->is('akun/riwayat-pengiriman'))
                <div class="d-flex mt-3">
                   <a href="{{route('front.akun')}}" class="me-3 my-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                      </svg>
                   </a>
                    <h3 class="my-auto">Riwayat Pengiriman</h3>
                </div>
                @endif
            </div>
        </div>
    </div>
</header>
@else
<header class="fixed-top header-2">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <a class="navbar-brand" href="#">
                        <img src="{{asset('front/img/logo/logo-pethero.png')}}" width="141.65" alt="">
                      </a>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bell-fill" style="color: #C1132F;" sty viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                          </svg>
                      </a>
                </div>
            </div>
        </div>
    </div>
</header>
@endif
