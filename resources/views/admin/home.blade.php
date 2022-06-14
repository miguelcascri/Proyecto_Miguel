@extends('admin.layouts.theme')

@section('content')

    <div class="app-wrapper">



        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="row d-flex justify-content-center">

                <div class="col-md-4">
                    <div class="card d-flex justify-content-center" style="padding: 10%; box-shadow: 0px 0px 5px 1px gray;">
                        <div class="d-flex justify-content-center">
                            <h3>Numero de Reservas</h3>
                        </div>
                        <div class="d-flex justify-content-center">
                            <h1>{{ $Numreserve }}</h1>
                            
                        </div>
                        <p  class="d-flex justify-content-center mt-4" ><a href="{{ route('adminreservas')}}">Acceder a Reservas</a></p>
						
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="card d-flex justify-content-center" style="padding: 10%; box-shadow: 0px 0px 5px 1px gray;">
                        <div class="d-flex justify-content-center">
                            <h3>Numero de Comentarios</h3>
                        </div>
                        <div class="d-flex justify-content-center">
                            <h1>{{ $NumComent }}</h1>
                        </div>
                        <p  class="d-flex justify-content-center mt-4" ><a href="{{ route('admincoments')}}">Acceder a Comentarios</a></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card d-flex justify-content-center" style="padding: 10%; box-shadow: 0px 0px 5px 1px gray;">
                        <div class="d-flex justify-content-center">
                            <h3>Mesas Activas</h3>
                        </div>
                        <div class="d-flex justify-content-center">
                            <h1>{{ $NumMesa }}</h1>
                        </div>
                        <p  class="d-flex justify-content-center mt-4" ><a href="{{ route('adminmesas')}}">Acceder a Mesas</a></p>
                    </div>
                </div>
            </div>
            <div class="row mt-5 ">
                <div class="col-md-6">
                    <div class="title "><h3 class="text-secondary">Ultimas Clientes</h3></div>
                    <table class="table bg-white">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">DISPONIBLES</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Email</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($mostrarreserva as $item)
                          <tr>
                            <td class="cell">{{$item -> nombre}}</td>
                            <td class="cell">{{$item -> apellidos}}</td>
                            <td class="cell">{{$item -> DNI}}</td>
                            <td class="cell">{{$item -> telefono}}</td>
                            <td class="cell">{{$item -> email}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>

                <div class="col-md-6">
                    <div class="title "><h3 class="text-secondary">Ultimas Reservas</h3></div>
                    <table class="table bg-white">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Referencia</th>
                            <th scope="col">Hora</th>
                            <th scope="col">fecha</th>
                            {{-- <th scope="col"></th> --}}
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($mostrarreserva as $item)
                          <tr>
                            <td class="cell">{{$item -> referencia}}</td>
                            @if($item->Hora == 0)
                            <td class="cell">Almuerzo</td>
                            @elseif($item->Hora == 1)
                            <td class="cell">Cena</td>
                            @endif
                            <td class="cell">{{$item -> fecha}}</td>
                            {{-- <td class="cell">{{$item -> ID_Mesa}}</td> --}}
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>  


            </div>


        </div>
        <!--//app-content-->


    </div>
    <!--//app-wrapper-->
@endsection
