<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PetHero | @yield('title')</title>
    @include('Front.partials.style')
    @stack('style')
</head>
<body>
    {{-- header --}}
    @include('Front.partials.header')
    {{-- end header --}}

    {{-- main --}}
    <main>
        @yield('content')
    </main>
    {{-- end main --}}

    {{-- footer --}}
    @include('Front.partials.footer')
    {{-- end footer --}}

    @include('Front.partials.script')
    @stack('script')
</body>
</html>
