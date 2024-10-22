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
        <link href="/assets/img/favicon.ico" rel="icon">
        <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Vendor CSS Files -->
        <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="/assets/css/style.css" rel="stylesheet">



        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Added to get fontawsome  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Include jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Include Toastr -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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
            .toast {
                transition: all 0.4s ease-in-out;
            }
            #toast {
                border-radius: 25px;
         /*       background: linear-gradient(135deg, #ff7e5f, #feb47b); / * A warm gradient */
                background-color: rgba(0, 123, 255, 0.85); /* Semi-transparent blue background */
                color: white;
            }
            .toast-header {
                background-color: rgba(0, 0, 0, 0.2); /* Transparent header */
                color: white;
                animation: slideIn 0.6s ease-out;
            }
            .toast-body {
                background-color: rgba(0, 0, 0, 0.1); /* Slightly different for contrast */
            }
            @keyframes slideIn {
                from {
                    transform: translateY(-20px);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

        </style>
    </head>
    <body class="font-sans antialiased dark_mode">
    <!-- Toast notification container -->
    <div id="toastContainer" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1055;">

        <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">

                <strong class="me-auto">Notification</strong>
                <small class="text-muted">Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{-- session('toast_message') --}}
                {!! session('toast_message') !!}
            </div>
        </div>
    </div>

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
                            <li><a href="{{route('home')}}" class="text-light">Home</a></li>
                            <li><a href="/index.php#about" class="text-light">About</a></li>
                            <li><a href="#" class="text-light">Contact</a></li>
                            <li><a href="#" class="text-light">Privacy Policy</a></li>
                        </ul>
                    </div>

                    <!-- Column 3: Social Media -->
                    <div class="col-md-4">
                        <h5>Follow Us</h5>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="https://www.facebook.com/Stevendeemer2017/" class="text-light">
                                    <i class="fab fa-facebook fa-2x"></i>
                                </a>
                            </li>
                    {{--        <li class="list-inline-item">
                                <a href="#" class="text-light">
                                    <i class="fab fa-twitter fa-2x"></i>
                                </a>
                            </li> --}}
                            <li class="list-inline-item">
                                <a href="https://www.instagram.com/sd1964.with/" class="text-light">
                                    <i class="fab fa-instagram fa-2x"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.linkedin.com/in/steven-deemer/" class="text-light">
                                    <i class="fab fa-linkedin fa-2x"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://github.com/sdeemer1027" class="text-light">
                                    <i class="fab fa-github fa-2x"></i>
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
        <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="/assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="/assets/js/main.js"></script>


    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        };

        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
        @endif
    </script>

    </body>
</html>
