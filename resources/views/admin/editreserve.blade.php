@extends('admin.layouts.theme')

@section('content')
    <style>
        .inputedit {
            background-color: aliceblue;
        }

    </style>
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">GESTIÓN DE RESERVAS</h1>
                    </div>
                </div>
                <!--//tab-content-->
            </div>
            <!--//container-fluid-->
        </div>
        <div class="card">
            <div class="header">

            </div>
            <div class="body">
                {{-- @foreach ($reserve as $item) --}}
                <div style="margin: 0 auto; width: 80% ">

                    @foreach ($allreserve as $reserve)
                        <form action="{{ route('UpdateReserva', $reserve->RESERVAID) }}" method="Post">
                            @csrf
                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <label class="form-label" style="font-weight: bold">Nombre:</label>
                                    <input class="form-control bg-light inputedit" type="text" name="nombre"
                                        value="{{ $reserve->nombre }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" style="font-weight: bold">Apellidos:</label>
                                    <input class="form-control inputedit" type="text" name="apellidos"
                                        value="{{ $reserve->apellidos }}">
                                </div>

                            </div>
                            <div class="row mt-4">
                                <div class="col-md-8">
                                    <label class="form-label" style="font-weight: bold">Email:</label>
                                    <input class="form-control bg-light inputedit" type="email" name="email"
                                        value="{{ $reserve->email }}">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <label class="form-label" style="font-weight: bold">DNI</label>
                                    <input class="form-control bg-light inputedit" type="number" name="DNI"
                                        value="{{ $reserve->DNI}}" >
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" style="font-weight: bold">Telefono:</label>
                                    <input class="form-control inputedit" type="text" name="telefono"
                                        value="{{ $reserve->telefono }}">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <label class="form-label" style="font-weight: bold">Numero de Mesa</label>
                                    <input class="form-control bg-light inputedit" type="number" name="Numeromesa"
                                        value="{{ $reserve->Numeromesa }}" disabled>
                                        <input class="form-control inputedit bold " type="text" name="ID_Mesa"
                                        value="{{ $reserve->ID_Mesa }}" style="height: 3em;" hidden>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" style="font-weight: bold">Referencia:</label>
                                    <input class="form-control inputedit" type="text" name="referencia"
                                        value="{{ $reserve->referencia }}">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <label class="form-label" style="font-weight: bold">Hora: </label>

                                    <select class="form-select inputedit" name="Hora">
                                        @if ($reserve->Hora == 0)
                                            <option name="Hora" value="0">Almuerzo</option>
                                            <option name="Hora" value="1">Cena</option>
                                        @elseif($reserve->Hora == 1)
                                            <option name="Hora" value="1">Cena</option>
                                            <option name="Hora" value="0">Almuerzo</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" style="font-weight: bold">Fecha:</label>
                                    <input class="form-control inputedit" type="date" name="fecha" min=<?php $hoy=date("Y-m-d"); echo $hoy;?>
                                        value="{{ $reserve->fecha }}" data-toggle="modal"
                                        data-target=".bd-example-modal-lg" >
                                </div>
                            </div>
                            <button type="submit" class="mt-5 mb-5 btn btn-primary">Confirmar Edición</button>

                        </form>
                    @endforeach
                </div>
                {{-- @endforeach --}}
            </div>

        </div>
    </div>
    <!--//app-content-->
@endsection
