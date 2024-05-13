<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    <link rel="stylesheet" href="{{ asset('mazer2.0/assets/css/main/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('mazer2.0/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('mazer2.0/assets/images/logo/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('mazer2.0/assets/css/shared/iconly.css') }}">
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="index.html"><img src=""
                                    alt="Logo"></a>
                        </div>
                        <div class="header-top-right"> @guest
                                @if (Route::has('login'))
                                    <li class="btn">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @endif @if (Route::has('register'))
                                        <li class="btn">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <div class="dropdown">
                                        <a href="#" id="topbarUserDropdown"
                                            class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="avatar avatar-md2">
                                                <img src="{{ asset('mazer2.0/assets/images/faces/1.jpg') }}" alt="Avatar">
                                            </div>
                                            <div class="text">
                                                <h6 class="user-dropdown-name">John Ducky</h6>
                                                <p class="user-dropdown-status text-sm text-muted">Member</p>
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-lg"
                                            aria-labelledby="topbarUserDropdown">
                                            <li><a class="dropdown-item" href="#">My Account</a></li>
                                            <li><a class="dropdown-item" href="#">Settings</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Logout</a>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                @endguest
                                <!-- Burger button responsive -->
                                <a href="#" class="burger-btn d-block d-xl-none">
                                    <i class="bi bi-justify fs-3"></i>
                                </a>
                        </div>
                    </div>
                </div>
            </header>
            <div class="content-wrapper container">
                @yield('content')
            </div>

        </div>
    </div>
    <script src="{{ asset('mazer2.0/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('mazer2.0/assets/js/app.js') }}"></script>
    <script src="{{ asset('mazer2.0/assets/js/pages/horizontal-layout.js') }}"></script>
    <script src="{{ asset('mazer2.0/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('mazer2.0/assets/js/pages/dashboard.js') }}"></script>
</body>

</html>
