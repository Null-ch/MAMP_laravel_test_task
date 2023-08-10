<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>МАМР // Тестовое задание Backend (junior)</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>

<body>
    <nav class="py-2 bg-light border-bottom">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="/" class="nav-link link-dark px-2 active"
                        aria-current="page">Главная</a></li>
                @if ((int) auth()->user()->role == 0)
                    <li class="nav-item"><a href="{{ route('admin.index') }}" class="nav-link link-dark px-2">Admin
                            Panel</a></li>
                @endif
            </ul>
            <ul class="ml-auto">
                @if (!auth())
                    <li class="nav-item"><a href="/login" class="nav-link px-2 ">Войти</a></li>
                @endif
                @if (auth())
                    <li class="nav-item"><a href="{{ url('/logout') }}" class="nav-link px-2">Выйти</a></li>
                @endif
            </ul>
        </div>
    </nav>
    @yield('content')
    @include('includes.footer')

    <script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        AOS.init({
            duration: 600
        });
    </script>
</body>

</html>
