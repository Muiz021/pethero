<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('front/img/logo/logo-head.png')}}">
    <title>PetHero | @yield('title')</title>
    @include('front.partials.style')
    @stack('style')
</head>
<body>
    {{-- header --}}
    @include('front.partials.header')
    {{-- end header --}}

    {{-- main --}}
    <main>
        @yield('content')
    </main>
    {{-- end main --}}

    {{-- footer --}}
    @include('front.partials.footer')
    {{-- end footer --}}

    {{-- navbar --}}
    @include('front.partials.navbar')
    {{-- end navbar --}}

    @include('front.partials.script')
    @stack('script')
</body>
</html>
