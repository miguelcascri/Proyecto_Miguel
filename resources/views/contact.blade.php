@extends('layouts.tema')

@section('content')
    {{-- @include('layouts.contactCSS') --}}
    <style>
        #form {
            width: 250px;
            margin: 0 auto;
            height: 50px;
        }

        #form p {
            text-align: center;
        }

        #form label {
            font-size: 20px;
        }

        input[type="radio"] {
            display: none;
        }

        label {
            color: grey;
        }

        .clasificacion {
            direction: rtl;
            unicode-bidi: bidi-override;
        }

        label:hover,
        label:hover~label {
            color: orange;
        }

        input[type="radio"]:checked~label {
            color: orange;
        }


        .calificacionclass {
            margin-left: -41%;
            margin-top: 2%;
        }


        #Contactomin769 {
            display: block;
        }

        #Contactomax769 {
            display: none;
        }

        @media(max-width:768px) {
            #Contactomin769 {
                display: none;
            }

            #Contactomax769 {
                display: block;
            }

        }
    </style>
    <main style="margin-top: 0%; width: 90%; margin: 0 auto;margin-bottom: 5%;" id="Contactomax769" class="text-white">
        <h1 class="logocontact mb-3">Deje aquí su opinión
        </h1>

        <div class="contact-info" style="padding: 5%;">
            <h4>Mas información</h4>
            <ul>
                <li><i class="fas fa-map-marker-alt"></i> Cruz Conde, 8</li>
                <li><i class="fas fa-phone"></i>957459365</li>
                <li><i class="fas fa-envelope-open-text"></i> edenrestaurante@gmail.com</li>
            </ul>
            <p>Mier-Dom: 13:00 AM - 17:00 PM / 20:30 PM - 00:00 AM</p>

        </div>
        <div class="contact-form">
            {{-- <form action="{{route('crearcoment') }}" method = "post"> --}}
            <form action="{{ route('comentarios') }}" method="Post">

                @csrf
                <p>
                    <label>Nombre</label>
                    <input type="text" name="nombre" required>
                </p>
                <p>
                    <label>Email</label>
                    <input type="email" name="email" required>
                </p>
                <p>
                    <label>Numero de telefono</label>
                    <input type="int" name="telefono" required>
                </p>
                <p class="block">
                    <label>Comentario</label>
                    <textarea name="descripcion" rows="3" required></textarea>
                </p>
                {{-- <div class="row" style="margin: 0 auto; display: block;">
                    <div class="col-md-12">
                        <label>Calificacion</label>
                    </div>
                    <div class="col-md-12">
                        <p class="clasificacion group-required">
                            <input id="radio1" type="radio" name="estrellas" value="5">
                            <label for="radio1">★</label>
                            <input id="radio2" type="radio" name="estrellas" value="4">
                            <label for="radio2">★</label>
                            <input id="radio3" type="radio" name="estrellas" value="3">
                            <label for="radio3">★</label>
                            <input id="radio4" type="radio" name="estrellas" value="2">
                            <label for="radio4">★</label>
                            <input id="radio5" type="radio" name="estrellas" value="1" required>
                            <label for="radio5">★</label>
                        </p>
                    </div>

                </div> --}}


                <p class="block mb-4">
                    <input class="btn btn-danger" type="submit" value="Enviar Opinión">
                </p>
            </form>
        </div>
    </main>

    <main style="margin-top: 0%;" id="Contactomin769" class="text-white">
        <h1 class="logocontact">Deje aquí su opinión
        </h1>
        <div class="contact-wrapper animated bounceInUp">
            <div class="contact-form">
                {{-- <form action="{{route('crearcoment') }}" method = "post"> --}}
                <form action="{{ route('comentarios') }}" method="Post">

                    @csrf
                    <p>
                        <label>Nombre</label>
                        <input type="text" name="nombre" required>
                    </p>
                    <p>
                        <label>Email</label>
                        <input type="email" name="email" required>
                    </p>
                    <p>
                        <label>Numero de telefono</label>
                        <input type="int" name="telefono" required>
                    </p>
                    <p class="block">
                        <label>Comentario</label>
                        <textarea name="descripcion" rows="3"></textarea>
                    </p>
                    <p class="block">
                        <input class="btn btn-danger" type="submit" value="Enviar Opinión">
                    </p>
                </form>
            </div>
            <div class="contact-info" style="padding-top: 40%;">
                <h4>Mas información</h4>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> Cruz Conde, 8</li>
                    <li><i class="fas fa-phone"></i>957459365</li>
                    <li><i class="fas fa-envelope-open-text"></i> edenrestaurante@gmail.com</li>
                </ul>
                <p>Mier-Dom: 13:00 AM - 17:00 PM / 20:30 PM - 00:00 AM</p>

            </div>
        </div>
    </main>
@endsection
