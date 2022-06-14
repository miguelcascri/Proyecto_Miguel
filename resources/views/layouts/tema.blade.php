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
<style>


.botonDisponibilidad{
    width: 134%;
}
.li_menu{
    margin-left: 10%;
}

@media(max-width: 768px){
    .botonDisponibilidad{
    width: 70%;
    }
    .li_menu{
    margin-left: 0%;
    display: block;
    text-align: center;
    margin: 4%;
    }

}

</style>
<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center fixed-top ">
        <div
            class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
            <i class="bi bi-phone d-flex align-items-center"><span>957459365</span></i>
            <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mier-Dom: 13:00 AM - 17:00 PM / 20:30 PM - 00:00 AM</span></i>
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
                <ul >
                    <li><a style="font-size: large" class="nav-link scrollto" href="/">Inicio</a></li>
                    <li><a style="font-size: large" class="nav-link scrollto" href="/carta">Carta</a></li>
                    <li><a style="font-size: large;" class="nav-link scrollto" href="/contact">Contacto</a></li>
                    <li></li>
                    <li class="li_menu"><button type="button" class="btn btn-success botonDisponibilidad" data-toggle="modal"
                            data-target="#myModal">
                            <i class="far fa-bookmark" style="margin-right: 5%"></i> Reservar
                        </button></li>
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
                {{-- <div class="d-flex justify-content-between align-items-center">
          <h2>Inner Page</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>Inner Page</li>
          </ol>
        </div> --}}

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page" style="padding: 0px; padding-top:0%" >
            <main>
                <!-- The Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content bg-light" style="width: 100%;">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">INTRODUZCA FECHA Y HORA</h4>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" style="width: 100%">
                                <div class="card text-white bg-dark" style="margin-left: 7%; width: 84%">
                                    <h5 class="card-header">COMRPOBAR DISPONIBILIDAD</h5>
                                    <div class="card-body bg-secondary">
                                        <form action="{{ route('disponibilidad') }}" method="post">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-5 form-group">
                                                    <label for="exampleFormControlInput1" class="text-white">Fecha</label>
                                                    <input type="date" class="form-control" id="fecha" name="fecha"  min=<?php $hoy=date("Y-m-d"); echo $hoy;?>
                                                         placeholder="fecha" required>
                                                </div>
                                               
                                                <div class="col-md-5 form-group">
                                                    <label for="exampleFormControlInput1" class="text-white">Hora</label>
                                                    <select class="form-select" name="hora" required 
                                                        aria-label="Default select example">
                                                        <option name="hora" value="0">Almuerzo</option>
                                                        <option name="hora" value="1">Cena</option>
                                                    </select>
                                                </div>
                                            </div><br>
                                            <input type="submit" onclick="mostrar()" class="btn btn-primary"
                                                value="Comprobar" style="margin: 0 auto; display: block; text-align: center; width: 60%;" />
                                        </form>


                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>

                        </div>
                    </div>
                </div>
                @yield('content')
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
