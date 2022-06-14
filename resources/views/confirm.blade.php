<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{-- <link href="assets/img/favicon.png" rel="icon"> --}}
    {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    @include('layouts.contactCSS')

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/estiloswel.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center fixed-top ">
        <div
            class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
            <i class="bi bi-phone d-flex align-items-center"><span>957459365</span></i>
            <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mier-Dom: 13:00 AM - 17:00 PM / 20:30
                    PM - 00:00 AM</span></i>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center ">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <div class="logo me-auto">
                <h1><a href="/">EDÉN Restaurante </a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="/">Inicio</a></li>
                    <li><a class="nav-link scrollto" href="/carta">Carta</a></li>
                    {{-- <li><a class="nav-link scrollto" href="/contact">Contacto</a></li>  --}}
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->


            {{-- <a href="#book-a-table" class="book-a-table-btn scrollto">Book a table</a> --}}

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">


            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <main class="py-4" style="width: 90%;margin: 0 auto;margin-bottom: 8%;">
                <div class="card">
                    <div class="card-header">
                        <h5 class="tittle">
                            JUSTIFICANTE DE RESERVA
                        </h5>
                    </div>
                    <div class="card body row" style="padding-left: 5%">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th class="cell">Nombre</th>
                                    <th class="cell">Apellidos</th>
                                    <th class="cell">DNI</th>
                                    <th class="cell">Email</th>
                                    <th class="cell">Telefono</th>
                                    <th class="cell">Referencia</th>
                                    {{-- <th class="cell">Numero de mesa</th> --}}
                                    <th class="cell">Hora</th>
                                    
                                    <th class="cell">Fecha</th>
                                   
                                </tr>
                                <tr>
                                    <td class="cell">{{$nombre}}</td>
                                    <td class="cell">{{$apellidos}}</td>
                                    <td class="cell">{{$DNI}}</td>
                                    <td class="cell">{{$email}}</td>
                                    <td class="cell">{{$telefono}}</td>
                                    {{-- <td class="cell">{{$Numeromesa}}</td> --}}
                                    <td class="cell">{{$reference}}</td>
                                    @if($Hora == 0)
                                    <td class="cell">Almuerzo</td>
                                    @elseif($Hora == 1)
                                    <td class="cell">Almuerzo</td>
                                    @endif
                                    <td>{{$fecha}}</td>
                                </tr>
                                {{-- @foreach($reserva as $key)
                                    <tr>
                                        <td>{{$key->fecha}}</td>
                                        <td>{{$key->nombre}}</td>
                                        <td>{{$key ->apellidos}}</td>
                                    </tr>
                                @endforeach --}}
                            </table>

                        </div>
                        <?php
                            // $client;
                            // dd($referencia);
                        ?>
                        


                        <div class="col-md-12">
                            <a class="btn btn-success mt-5 mb-3" href="{{route('generarPDF', $reference)}}">
                                Descargar Justificante
                                </a>

                                <a class="btn btn-primary mt-5 mb-3" href="contact">
                                    Deja tu Valoración
                                </a>
                        </div>
                    </div>
            </main>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <h3>EDÉN RESTAURANTE</h3>
            <p>EL MEJOR RESTAURANTE DE ESPAÑA</p>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


    @include('layouts.js')

</body>

</html>
