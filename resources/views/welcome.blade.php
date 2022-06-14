@extends('layouts.tema')

@section('content')
    <style>
        body {
            width: 99%;
        }

        .dejaval {
            margin: 0 auto;
            display: block;
            colo
        }

        #footer {
            background: #35322d;
            color: #fff;
            font-size: 14px;
            text-align: center;
            padding: 30px 0;
            margin-right: -1%;

        }

        .contacto {
            background-color: #F3F3F3;
        }

        .allcontacto {
            background-color: gainsboro;
            text-align: center;
            /* height: 20em; */
            font-size: 200%;
            /* border-color: black; */
            /* border: solid; */
            border-top: solid;
            border-top-color: black;
            border-bottom: solid;
            border-bottom-color: black;
            width: 101%;
            margin-bottom: 0%;
        }

        .cuadrocontact {
            margin-left: 5%;
        }

        .filawelcome{
            width: 80%; 
            margin: 0 auto; 
            box-shadow: -10px 0px 13px -7px #0000002e, 
                        10px 0px 13px -7px #0000002e, 
                        0px 0px 4px -23px rgb(0 0 0 / 0%);
        }

        @media(max-width:768px){
            
        .filawelcome{
            width: 100%; 
            margin: 0%; 
            box-shadow: none;
        }
        }
    </style>

    <div class="row filawelcome">

        <div class="ml-1 justify-content-center" style="padding-top: 4%; margin: 0 auto;width: 93%;">
            <h1> Bienvenido a EDÉN Restaurante</h1>
            <p class="mt-5">
            <h4>
                Una progresión de ingredientes exoticos y hermosos donde la textura,
                el sabor y la armonía son primordiales. Sumérjase en la experiencia
                gastronómica de España con los menús de Edén y la lista de vinos
                seleccionada por las mejores bodegas de la campilla Sur Cordobesa
            </h4>
            </p>
        </div>

        <img style="margin: 0 auto;width: 86%;margin-top: 2%;margin-bottom: 2%;"
            src="{{ asset('assets\images\portada2.jpg') }}">




        <div class="card mt-5" style="border: none;
        width: 93%;
        margin: 0 auto;">
            <div class="card-tittle">
                <h3>Donde encontrarnos</h3>
                <p>
                <h4>Nos encontramos en el número 8 de la Calle Cruz Conde, Córdoba, de Miercoles a Domingo</h4>
                </p>
            </div>


        </div>
        <div id="map-container-google-2" class="z-depth-1-half map-container" style="text-align: center">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1904.5219453112547!2d-4.7811554417763285!3d37.8855780118389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6cdf6337f0f21b%3A0x115d49270350f559!2sC.%20Cruz%20Conde%2C%208%2C%2014003%20C%C3%B3rdoba!5e1!3m2!1ses!2ses!4v1654032285728!5m2!1ses!2ses"
                width="93%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="card mt-5" style="border: none">
            <div class="card-tittle">
                <h3>Comentarios</h3>
            </div>
            <div class="card-body">
                <div class="row" style="width: 100%">
                    @foreach ($AllComents as $item)
                        <div class="col-md-3 bg-light m-3"
                            style="border: solid 1px black;border-radius: 12px; box-shadow: 0px 0px 5px 1px gray;">
                            <div>
                                <p class="h5 mt-3">{{ $item->nombre }}</p>
                                <hr>
                            </div>
                            <div class="card-body row">
                                <span class="col-md-12"><b>Correo: </b>{{ $item->email }}</span>
                                <p class="mt-3 text-black">{{ $item->descripcion }}</p>
                                <span>

                                </span>
                            </div>
                        </div>
                    @endforeach

                    <div class="dejaval">
                        <a href="/contact">
                            <h3>Deja tu opinión</h3>
                        </a>
                    </div>


                </div>
            </div>
        </div>
        {{-- <div>
            <p class="allcontacto mt-3">COMENTARIOS</p>
            <div class="contacto row">
                <div class="col-md-3 mt-5 mb-4 cuadrocontact">
                    <div class="card">
                        <div class="card-header">
                            NOMBRE
                        </div>
                        <div class="card-body">
                            LO DEMAS
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
