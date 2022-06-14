@extends('layouts.tema')

@section('content')
    <style>
        .cartastilos {
            width: 30%;
            margin-left: 10%;
            border: 0
        }


        @media(max-width:768px) {
            .cartastilos {
                width: 90%;
                margin-left: 0%;
                margin: 0 auto;
                display: block;
                margin-bottom: 5%;
            }
        }
    </style>
    <div class="row" style="margin: 0 auto">

        <div class="col-sm-5 card cartastilos">
            <img class="card-img-top" src="\assets\images\carta\carta1.jpg" alt="Card image cap">
            <div class="card-body" style="background-color: #F3F3F3;">
                <h5 class="card-title">Menu Desgutación</h5>
                <p class="card-text">Disfruta este menu con los sabores elegantes de sus platos</p>
                <a href="\assets\PDF\Menu_Degustación.pdf" download="Menu_Degustacion">
                    <button style="width: 95%;" type="button" class="btn btn-primary">
                        Descargar Menú
                    </button>
                </a>

            </div>
        </div>
        <div class="col-sm-5 card cartastilos">
            <img class="card-img-top" src="\assets\images\carta\Menu2.png" alt="Card image cap">
            <div class="card-body" style="background-color: #F3F3F3;">
                <h5 class="card-title">Sedundo Menu</h5>
                <p class="card-text">Disfruta este menu con los sabores elegantes de sus platos</p>
                <a href="\assets\PDF\menu2.pdf" download="Menu_Segundo">
                    <button style="width: 95%;" type="button" class="btn btn-primary">
                        Descargar Menú
                    </button>
                </a>

            </div>
        </div>
        <div class="col-sm-5 card cartastilos">
            <img class="card-img-top" src="\assets\images\carta\Menu1.png" alt="Card image cap">
            <div class="card-body" style="background-color: #F3F3F3;">
                <h5 class="card-title">Tercer Menu</h5>
                <p class="card-text">Disfruta este menu con los sabores elegantes de sus platos</p>
                <a href="\assets\PDF\menu3.pdf" download="Menu_Tercero">
                    <button style="width: 95%;" type="button" class="btn btn-primary">
                        Descargar Menú
                    </button>
                </a>

            </div>
        </div>
    </div>
@endsection
