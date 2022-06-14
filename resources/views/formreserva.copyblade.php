@extends('layouts.tema')

@section('content')
    <style>
        .mesasdisponibles {
            margin: 2%;
            height: auto;
            padding-top: 3%;
            border-radius: 20px;
        }

        @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap");

        * {
            margin: 0;
            padding: 0;
        }

        body {
            background: #ecf2fe;
            height: 100vh;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            font-family: "Roboto", sans-serif;
        }

        .plans {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;

            max-width: 970px;
            padding: 85px 50px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            background: #fff;
            border-radius: 20px;
            -webkit-box-shadow: 0px 8px 10px 0px #d8dfeb;
            box-shadow: 0px 8px 10px 0px #d8dfeb;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .plans .plan input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .plans .plan {
            cursor: pointer;
            width: 48.5%;
        }

        .plans .plan .plan-content {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            padding: 30px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            border: 2px solid #e1e2e7;
            border-radius: 10px;
            -webkit-transition: -webkit-box-shadow 0.4s;
            transition: -webkit-box-shadow 0.4s;
            -o-transition: box-shadow 0.4s;
            transition: box-shadow 0.4s;
            transition: box-shadow 0.4s, -webkit-box-shadow 0.4s;
            position: relative;
        }

        .plans .plan .plan-content img {
            margin-right: 30px;
            height: 72px;
        }

        .plans .plan .plan-details span {
            margin-bottom: 10px;
            display: block;
            font-size: 20px;
            line-height: 24px;
            color: #252f42;
        }

        .container .title {
            font-size: 16px;
            font-weight: 500;
            -ms-flex-preferred-size: 100%;
            flex-basis: 100%;
            color: #252f42;
            margin-bottom: 20px;
        }

        .plans .plan .plan-details p {
            color: #646a79;
            font-size: 14px;
            line-height: 18px;
        }

        .plans .plan .plan-content:hover {
            -webkit-box-shadow: 0px 3px 5px 0px #e8e8e8;
            box-shadow: 0px 3px 5px 0px #e8e8e8;
        }

        .plans .plan input[type="radio"]:checked+.plan-content:after {
            content: "";
            position: absolute;
            height: 11px;
            width: 11px;
            background: #216fe0;
            right: 20px;
            top: 20px;
            border-radius: 100%;
            border: 3px solid #fff;
            -webkit-box-shadow: 0px 0px 0px 2px #0066ff;
            box-shadow: 0px 0px 0px 2px #0066ff;    
        }

        .plans .plan input[type="radio"]:checked+.plan-content {
            border: 2px solid #216ee0;
            background: #eaf1fe;
            -webkit-transition: ease-in 0.3s;
            -o-transition: ease-in 0.3s;
            transition: ease-in 0.3s;
        }

        @media screen and (max-width: 991px) {
            .plans {
                margin: 0 20px;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-align: start;
                -ms-flex-align: start;
                align-items: flex-start;
                padding: 40px;
            }

            .plans .plan {
                width: 100%;
            }

            .plan.complete-plan {
                margin-top: 20px;
            }

            .plans .plan .plan-content .plan-details {
                width: 70%;
                display: inline-block;
            }

            .plans .plan input[type="radio"]:checked+.plan-content:after {
                top: 45%;
                -webkit-transform: translate(-50%);
                -ms-transform: translate(-50%);
                transform: translate(-50%);
            }
        }

        @media screen and (max-width: 767px) {
            .plans .plan .plan-content .plan-details {
                width: 60%;
                display: inline-block;
            }
        }

        @media screen and (max-width: 540px) {
            .plans .plan .plan-content img {
                margin-bottom: 20px;
                height: 56px;
                -webkit-transition: height 0.4s;
                -o-transition: height 0.4s;
                transition: height 0.4s;
            }

            .plans .plan input[type="radio"]:checked+.plan-content:after {
                top: 20px;
                right: 10px;
            }

            .plans .plan .plan-content .plan-details {
                width: 100%;
            }

            .plans .plan .plan-content {
                padding: 20px;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-align: baseline;
                -ms-flex-align: baseline;
                align-items: baseline;
            }
        }

        /* inspiration */
        .inspiration {
            font-size: 12px;
            margin-top: 50px;
            position: absolute;
            bottom: 10px;
            font-weight: 300;
        }

        .inspiration a {
            color: #666;
        }

        @media screen and (max-width: 767px) {

            /* inspiration */
            .inspiration {
                display: none;
            }
        }

    </style>
    <!--
        Inspiration:
        https://dribbble.com/shots/16297618/attachments/8174807?mode=media
        -->

    <div class="card" style=" width: 80%;margin: 0 auto;margin-top: 22%;display: block;">
        <h5 class="card-header">REALIZA TU RESERVA </h5>
        <div class="card-body">


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
                            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">DNI</label>
                            <input type="text" class="form-control" id="DNI" name="DNI" placeholder="DNI" required>
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
                                <div class="plans">
                                   
                                    

                                    @foreach ($mesascompletas as $item)
                                     
                                        <label class="plan basic-plan" for="basic">
                                            {{-- <input type="radio" name="ID_Mesa" id="ID_Mesa" value="{{ $item->id }}"/> --}}
                                            <input type="radio" id="complete" name="plan" />
                                            {{-- <input type="radio" id="ID_Mesa" value="{{ $item->id }}" name="ID_Mesa" required> --}}
                                            <div class="plan-content">
                                              <img loading="lazy" src="assets\images\iconmesa.png" alt="" />
                                              <div class="plan-details">
                                                <span>Mesa {{$item->Numeromesa}}</span>
                                                <p>Comensales: {{ $item->Comensales }}</p>
                                              </div>
                                            </div>
                                          </label>

                                    @endforeach
                                    <br>
                                <label class="plan basic-plan" for="basic">
                                    <input type="radio" name="plan" id="basic" />
                                    <div class="plan-content">
                                      <img loading="lazy" src="assets\images\iconmesa.png" alt="" />
                                      <div class="plan-details">
                                        <span>Basic</span>
                                        <p>For smaller business, with simple salaries and pay schedules.</p>
                                      </div>
                                    </div>
                                  </label>
                              
                                  <label class="plan complete-plan" for="complete">
                                    <input type="radio" id="complete" name="plan" />
                                    <div class="plan-content">
                                      <img loading="lazy" src="assets\images\iconmesa.png" alt="" />
                                      <div class="plan-details">
                                        <span>Complete</span>
                                        <p>For growing business who wants to create a rewarding place to work.</p>
                                      </div>
                                    </div>
                                  </label>
                                  </div>
                                </div>                              
                            </div>



                        </div>
                    </div>
                </div>
            </div><br>

            </form>
        </div>
    </div>
    </div>
@endsection
