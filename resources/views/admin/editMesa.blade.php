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
                        <h1 class="app-page-title mb-0">Gestión de Mesas</h1>
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
                
                @php
                    
                    $MesaNum =  sizeof($allmesas);
                @endphp
                <div style="margin: 0 auto; width: 80% ">
                        <form action="{{ route('editmesa', $mesaedit->id) }}" method="Post">
                            @csrf
                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <label class="form-label" style="font-weight: bold">Numero de Mesa</label>
                                    <input class="form-control inputedit bold " type="number" name="Numeromesa"
                                        value="{{ $mesaedit->Numeromesa }}" style="height: 3em;" min="{{$MesaNum}}">
                                        
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" style="font-weight: bold">Numero de Comensales</label>
                                    <select class="form-select form-select-lg mb-3"
                                    name="Comensales" aria-label=".form-select-lg example">

                                    <option value="2">2</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                    <option value="8">8</option>
                                    <option value="10">10</option>
                                </select>
                                </div>
                            </div>
                            
                            <button type="submit" class="mt-5 mb-5 btn btn-primary">Confirmar Edición</button>
                        </form>
                    </div>
                
                </div>
                
            </div>

        </div>
    </div>
    <!--//app-content-->
@endsection
