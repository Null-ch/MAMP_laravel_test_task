<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Блог - учебный проект</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>

<body>
    <div class="edica-loader"></div>
    <header class="edica-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                    data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="edicaMainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
                        </li>
                        @if (!auth())
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Войти <span class="sr-only">(current)</span></a>
                            </li>
                        @endif
                        @if ((int) auth()->user()->role == 0)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.index') }}" method="POST">Admin Panel</a>
                            </li>
                        @endif
                        @if (auth())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/logout') }}">Выйти <span
                                        class="sr-only">(current)</span></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    @yield('content')
    @include('admin.includes.footer')
    <script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
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
