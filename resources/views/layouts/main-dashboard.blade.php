<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mengkerent | {{ $title }}</title>

    <link rel="stylesheet" href="{{ asset('theme/dist/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/dist/assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('theme/dist/assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('theme/dist/assets/images/logo/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{ asset('theme/dist/assets/extensions/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/dist/assets/css/pages/simple-datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/dist/assets/css/shared/iconly.css') }}">
    <style>
        #content {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        #content.show {
            opacity: 1;
        }
    </style>

</head>

<body>
    <div id="loading" style="position: fixed; width: 100%; height: 100%; top: 0; left: 0; background: #ffffffa4; z-index: 9999; display: flex; justify-content: center; align-items: center;">
        <img src="{{ asset('theme/dist/assets/images/svg-loaders/audio.svg') }}" class="me-4" style="width: 3rem" alt="audio">
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            setTimeout(function() {
                $("#loading").fadeOut(1000, function() { 
                    $("#content").addClass('show');
                });
            }, 650); 
        });

        $(window).on('beforeunload', function(){
            $("#content").removeClass('show');
            $("#loading").fadeIn(1000); 
        });
    </script>

    <div id="app">

        @include('partials.main-sidebar')

        <div id="main" class='layout-navbar'>
            <header class="mb-3">
                <nav class="navbar navbar-expand navbar-light navbar-top style">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-lg-0">
                        
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-menu d-flex">
                                    <div class="user-name text-end me-3">
                                        <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
                                        <p class="mb-0 text-sm text-gray-600">{{ Auth::user()->role_display }}</p>
                                    </div>
                                    <div class="user-img d-flex align-items-center">
                                        <div class="avatar avatar-md">
                                            <img src="{{ asset ('theme/dist/assets/images/faces/1.jpg') }}">
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i> Settings</a></li>
                                <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout
                                    </a>
                                </li>
                            </ul>
                            
                        </div>
                    </ul>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>{{ ($title) }} </h3>
                                {{-- <p class="text-subtitle text-muted">{{ ($deskripsi) }}</p> --}}
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ ($title) }} </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>


                      @yield('page-content')

    
            @include('partials.main-footer')

