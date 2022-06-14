@extends('admin.layouts.theme')


@section('content')
    <style>
        .estrellaslabel {
            color: orange;
        }
    </style>
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">COMENTARIOS</h1>
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

                                </div>
                            </div>
                            <!--//row-->
                        </div>
                        <!--//table-utilities-->
                    </div>
                    <!--//col-auto-->
                </div>
                <!--//row-->

                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card-orders-table mb-5">
                            <div class="app-card-body">
                                <div class="row">
                                    @foreach ($AllComents as $item)
                                        <div class="col-md-3 bg-light m-3"
                                            style="border: solid 1px black;/* width: auto; */width: 30%;border-radius: 12px;box-shadow: 0px 0px 5px 1px gray;">
                                            <div>
                                                <p class="h5 mt-3">{{ $item->nombre }}</p>
                                                <hr>
                                            </div>
                                            <div class="card-body row">
                                                <span class="col-md-12"><b>Telefono:
                                                    </b><br>{{ $item->telefono }}</span>
                                                <span class="col-md-12"><b>Correo:</b><br>{{ $item->email }}</span>

                                                <p class="mt-3 text-black">{{ $item->descripcion }}</p>
                                                
                                            </div>
                                            <div class="mb-3" style="justify-content:flex-end; display: flex">
                                                <span>
                                                    <form action="{{ route('deletecoment', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger"><abbr
                                                                title="ELIMINAR"><i class="fa-regular fa-trash-can"></i></abbr></button>
                                                    </form>
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!--//app-card-body-->
                        </div>
                    </div>
                    <!--//tab-pane-->
                </div>
                <!--//tab-content-->
            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->
    @endsection
