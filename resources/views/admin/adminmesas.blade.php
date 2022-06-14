@extends('admin.layouts.theme')

@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Gestion de Mesas</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    {{-- <form class="table-search-form row gx-1 align-items-center">
                                        <div class="col-auto">
                                            <input type="text" id="search-orders" name="searchorders"
                                                class="form-control search-orders" placeholder="Search">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn app-btn-secondary">Search</button>
                                        </div>
                                    </form> --}}
                                    <button type="button" class="btn btn-success mt-4" data-toggle="modal"
                                        data-target="#exampleModalCenter">
                                        Añadir Mesa
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Añadir Nueva Mesa
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('crearmesa') }}" method="Post">
                                                        @csrf
                                                        <div class="mb-3">

                                                            <label for="exampleInputEmail1" class="form-label">Indica el
                                                                número de mesa</label>
                                                            <input class="form-control" type="number" name="Numeromesa">
                                                            <label for="exampleInputEmail1" class="form-label">
                                                                Especifica el numero de comensales</label>
                                                            <select class="form-select form-select-lg mb-3"
                                                                name="comensales" aria-label=".form-select-lg example">

                                                                <option value="2">2</option>
                                                                <option value="4">4</option>
                                                                <option value="6">6</option>
                                                                <option value="8">8</option>
                                                                <option value="10">10</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Añadir</button>
                                                        </div>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//table-utilities-->
                    </div>
                    <!--//col-auto-->
                </div>
                <!--//row-->




                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab"
                        href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Todas las mesas</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab"
                        href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Mesas para hoy</a>
                    {{-- <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Mñana</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Cancelled</a> --}}
                </nav>


                <div class="tab-content" id="orders-table-tab-content">

                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">

                                <div class="row d-flex justify-content-center pt-3 pb-3" style="background-color: #F3F3F3">



                                    @foreach ($TodasMesas as $key)
                                        @if ($key->Numeromesa <= 6)
                                            <div class="col-md-3 m-1 p-3 row mesasdisponibles bg-success text-dark"
                                                style=" display:block;border: solid 2px black;">
                                                <div class="col-md-5">
                                                    <p><img style="width: 50%"
                                                            src="{{ asset('assets\images\iconmesa.png') }}">
                                                    </p>
                                                </div>
                                                <div class="col-md-12"><b>
                                                        <p>Mesa {{ $key->Numeromesa }}</p>
                                                        <p>Comensales: {{ $key->Comensales }}</p>
                                                        <p hidden>{{ $key->id }}</p>
                                                    </b>
                                                    <div class="d-flex justify-content-center">
                                                        <div style="margin-right: 2.5%">
                                                            <a href="{{ route('reservemesas', $key->id) }}"
                                                                class="btn btn-info"><i class="fa-regular fa-eye"></i></a>
                                                        </div>
                                                        {{-- <div style="margin-right: 2.5%">
                                                            <a href="{{ route('updatemesa', $key->id) }}"
                                                                class="btn btn-warning"><i class="far fa-edit"></i></a>
                                                        </div> --}}
                                                        {{-- <div>
                                                            <form action="{{ route('deletemesa', $key->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger"><i
                                                                        class="fa-regular fa-trash-can"></i></button>
                                                            </form>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($key->Numeromesa > 6)
                                        <div class="col-md-3 m-1 p-3 row mesasdisponibles bg-success text-dark"
                                        style=" display:block;border: solid 2px black;">
                                        <div class="col-md-5">
                                            <p><img style="width: 50%"
                                                    src="{{ asset('assets\images\iconmesa.png') }}">
                                            </p>
                                        </div>
                                        <div class="col-md-12"><b>
                                                <p>Mesa {{ $key->Numeromesa }}</p>
                                                <p>Comensales: {{ $key->Comensales }}</p>
                                                <p hidden>{{$key->id}}</p>
                                            </b>
                                            <div class="d-flex justify-content-center">
                                                <div style="margin-right: 2.5%">
                                                    <a href="{{route('reservemesas', $key->id) }}"  class="btn btn-info"><i class="fa-regular fa-eye"></i></a>
                                                </div>
                                                <div style="margin-right: 2.5%">
                                                    <a href="{{route('updatemesa', $key->id) }}"  class="btn btn-warning"><i class="far fa-edit"></i></a>
                                                </div>
                                                <div>
                                                    <form
                                                    action="{{route('deletemesa', $key->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                                                </form>  
                                                </div>
                                            </div>
                                              

                                        </div>
                                    </div>
                                        @endif
                                    @endforeach
                                </div>

                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->

                    </div>
                    <!--//tab-pane-->

                    <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                        <div class="app-card app-card-orders-table mb-5">
                            <div class="app-card-body">
                                <div class="row d-flex justify-content-center pt-3 pb-3" style="background-color: #F3F3F3">
                                    @foreach ($AllMesas as $key)
                                        <div class="col-md-3 m-1 p-3 row mesasdisponibles bg-success text-dark"
                                            style=" display:block;border: solid 2px black;">
                                            <div class="col-md-5">
                                                <p><img style="width: 50%"
                                                        src="{{ asset('assets\images\iconmesa.png') }}">
                                                </p>
                                            </div>
                                            <div class="col-md-7"><b>

                                                    <p> Mesa {{ $key->Numeromesa }}</p>
                                                    <p>Comensales: {{ $key->Comensales }}</p>
                                                </b>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//tab-pane-->
                </div>
                <!--//tab-content-->



            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->
    @endsection
