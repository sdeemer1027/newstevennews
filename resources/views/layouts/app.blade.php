<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Steven,News') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />



        <!-- Favicons -->
        <link href="assets/img/favicon.ico" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">



        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Added to get fontawsome  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            footer h5 {
                margin-bottom: 20px;
                font-weight: bold;
            }

            footer p, footer ul {
                font-size: 14px;
            }

            footer a:hover {
                text-decoration: underline;
            }

            .list-inline-item a {
                margin-right: 10px;
                color: #fff;
            }

        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @auth
            @include('layouts.navigation') <!-- Show navigation for authenticated users -->
        @else
            @include('layouts.guestnavigation') <!-- Show guest navigation for unauthenticated users -->
        @endauth
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-gray dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>


        <footer class="bg-dark text-light pt-4">
            <div class="container">
                <div class="row">
                    <!-- Column 1: About Section -->
                    <div class="col-md-4">
                        <h5>About Us</h5>
                        <p>
                            Welcome to Steven News! Stay informed with the latest headlines, analysis, and reports from around the world.
                        </p>
                    </div>

                    <!-- Column 2: Quick Links -->
                    <div class="col-md-4">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="/home" class="text-light">Home</a></li>
                            <li><a href="/about" class="text-light">About</a></li>
                            <li><a href="/contact" class="text-light">Contact</a></li>
                            <li><a href="/privacy-policy" class="text-light">Privacy Policy</a></li>
                        </ul>
                    </div>

                    <!-- Column 3: Social Media -->
                    <div class="col-md-4">
                        <h5>Follow Us</h5>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="text-light">
                                    <i class="fab fa-facebook fa-2x"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-light">
                                    <i class="fab fa-twitter fa-2x"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-light">
                                    <i class="fab fa-instagram fa-2x"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-light">
                                    <i class="fab fa-linkedin fa-2x"></i>
                                </a>
                            </li>
                        </ul>
                        <BR>
                        <h5>QR Code</h5>
                        <div>{!! $qrCode !!}</div>
                        <p>Scan the QR code to visit Steven News</p>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col text-center">
                        <p>&copy; 2024 Steven News. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </footer>




        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>



    </body>
</html>
