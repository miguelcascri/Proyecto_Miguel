@extends('layouts.tema')

@section('content')
    <style>
        .mesasdisponibles {
            margin: 2%;
            height: auto;
            padding-top: 3%;
            border-radius: 20px;
            /* border: solid 2px blue; */
        }

        .mesasdisponibles:hover {
            margin: 2%;
            height: auto;
            padding-top: 3%;
            border-radius: 20px;
            box-shadow: 0 0 18px rgba(117, 119, 255, 1);
            -webkit-box-shadow: 0 0 18px rgba(117, 119, 255, 1);
            -moz-box-shadow: 0 0 18px rgba(117, 119, 255, 1);
        }

        .inputform {
            width: 100%;
        }

        input[type="radio"] {
            /* width: 10%; */
        }

        input[type="radio"]+.mesasdisponibles :checked {
            margin: 2%;
            height: auto;
            padding-top: 3%;
            border-radius: 20px;
            box-shadow: 0 0 18px rgba(117, 119, 255, 1);
            -webkit-box-shadow: 0 0 18px rgba(117, 119, 255, 1);
            -moz-box-shadow: 0 0 18px rgba(117, 119, 255, 1);
        }

        .bodyreserva {
            margin-left: 10%;
            width: 80%;
        }


        @media(max-width:768px) {
            .bodyreserva {
                margin-left: 0%;
                width: 100%;
                margin: 0 auto;
                display: block;
            }

            .mesasdisponibles {
                margin: 2%;
                height: auto;
                padding-top: 3%;
                border-radius: 20px;
                width: 46%;
                /* border: solid 2px blue; */
            }


        }
    </style>
    <div class="card bodyreserva mb-4">
        <h5 class="card-header">RESERVA </h5>
        <div class="card-body">
            

            @php
                // dd($mesascompletas, $comprobe);

                // dd(sizeof($mesascompletas));
                $mesaexit = sizeof ($comprobe);
            @endphp

            @if($mesaexit == 0 )

            <div style="margin-bottom: 8.54%" >
                <div>
                    <div class="card text-center" style="background-color: #FFE882;">
                      <p class="mt-3"><i class='fas fa-exclamation-triangle text-warning' style='font-size: 90px'></i></p>
                      <p class="mt-3"><span style="    font-size: x-large; font-weight: bold;">  No hay mesas disponibles para @if ($hora == 0) almorzar @elseif($hora == 1) cenar @endif el dia {{ $fecha }}<span> <p>
                    </div>
                </div>

                <a style="margin: 0 auto; display: block; width: 20%;margin-top: 5% " href="/" class="btn btn-primary">Pulsa para volver a Inicio</a>
            </div>


            @elseif($mesaexit > 0)
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1 text-white">Fecha</label>
                        <input type="text" class="form-control" id="fecha" name="fecha" value='{{ $fecha }}'
                            disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1">Hora</label>
                        @if ($hora == 0)
                            <input type="text" class="form-control" id="hora" name="Hora" value="Almuerzo" disabled>
                        @elseif($hora == 1)
                            <input type="text" class="form-control" id="hora" name="Hora" value="Cena" disabled>
                        @endif
                    </div>
                    <hr class="mt-4" width="100%" />
                    <form action="{{ route('crearreserva') }}" method="post">
                        @csrf
                        <input type="number" class="form-control" id="hora" name="Hora" value="{{ $hora }}"
                            hidden>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $fecha }}"
                            hidden>

                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                                required>
                        </div>

                        <?php
                        $ref0 = \Str::random(3);
                        $ref1 = \Str::random(3);
                        $ref2 = \Str::random(3);
                        $reference = $ref0 . '-' . $ref1 . '-' . $ref2;
                        ?>
                        <div class="form-group mb-3" hidden>
                            <label for="exampleFormControlInput1">Nombre</label>
                            <input type="text" value="{{ $reference }}" class="form-control" id="referencia"
                                name="referencia" placeholder="referencia" required>
                        </div>





                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos"
                                placeholder="Apellidos" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Cliente@gmail.com" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">Telefono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono"  minlength="9" maxlength="9" placeholder="Telefono"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">DNI</label>
                            <input type="text" class="form-control" id="DNI" name="DNI" placeholder="DNI" minlength="9" maxlength="9" required>
                        </div>

                        <input type="radio" class="mt-3"> <label class="mt-3"
                            style="margin-left: 2%">Aceptar terminos y condiciones</label>
                        <div class="form-group mb-3">
                            <input class="btn btn-primary mt-5" type="submit" onclick="validate()"
                                value="Confirmar Reserva">
                        </div>
                </div>
                <div class="col-md-8 ">
                    <div class="card">
                        <div class="card-header">
                            <h5>MESAS DISPONIBLES</h5>
                        </div>



                        <div class="card-body">
                            <div class="row">

                                @foreach ($comprobe as $item)
                                    <div class="col-md-5 row mesasdisponibles bg-success ">
                                        <div class="col-md-5">
                                            <p><img style="width: 100%" src="assets\images\iconmesa.png"></p>
                                        </div>
                                        <div class="col-md-7"><b>
                                                <p> Mesa {{ $item->Numeromesa }}</p>
                                                <p>Comensales: {{ $item->Comensales }}</p>
                                            </b>
                                        </div>
                                        <input type="radio" class="inputform" id="ID_Mesa" value="{{ $item->id }}"
                                            name="ID_Mesa" required style="margin-top: 1%;margin-bottom: 5%;">
                                    </div>
                                @endforeach
                            </div>



                        </div>
                    </div>
                </div>
            </div>

            </form>


            @endif

            
        </div>
    </div>
@endsection

<script>
    // function validate(){
    //     var div2 = document.getElementById("ID_Mesa")
    //     var div2Paras = div2.getElementsByTagName("ID_Mesa");

    //     var num = div2Paras.length;

    //     alert("Hay " + num + " <p> elementos en el elemento div2");
    //             // if ()
    //         }
</script>
