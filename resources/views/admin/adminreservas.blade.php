@extends('admin.layouts.theme')

@section('content')
    <style>
        #tablareserve_wrapper {
            margin-left: 2%;
        }

        #tablareserve_filter {
            margin-left: 60%;
        }

        .tablereservasscroll {
            overflow-x: hidden;
        }

        @media(max-width:768px) {
            .tablereservasscroll {
                overflow-x: auto;
            }
        }
    </style>
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">GESTIÓN DE RESERVAS</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    {{-- <a class="btn app-btn-secondary" href="#">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                            fill="currentColor" xmlns="https://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path fill-rule="evenodd"
                                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                        </svg>
                                        Download CSV

                                    </a> --}}

                                    {{-- <button class="btn btn-primary"
                                        onclick="exportTableToExcel('reserveIDtbl', 'reservas')">Exportar a Excel</button> --}}


                                    <script>
                                        function exportTableToExcel(reserveIDtbl, filename = 'reservas') {
                                            var downloadLink;
                                            var dataType = 'application/vnd.ms-excel';
                                            var tableSelect = document.getElementById(reserveIDtbl);
                                            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

                                            // Specify file name
                                            filename = filename ? filename + '.xls' : 'excel_data.xls';

                                            // Create download link element
                                            downloadLink = document.createElement("a");

                                            document.body.appendChild(downloadLink);

                                            if (navigator.msSaveOrOpenBlob) {
                                                var blob = new Blob(['ufeff', tableHTML], {
                                                    type: dataType
                                                });
                                                navigator.msSaveOrOpenBlob(blob, filename);
                                            } else {
                                                // Create a link to the file
                                                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                                                // Setting the file name
                                                downloadLink.download = filename;

                                                //triggering the function
                                                downloadLink.click();
                                            }
                                        }
                                    </script>

                                </div>
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
                        href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Todas</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab"
                        href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Hoy</a>
                    {{-- <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab"
                        href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Mañana</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab"
                        href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Esta
                        Semana</a> --}}

                </nav>


                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive tablereservasscroll">
                                    <table class="table app-table-hover mb-0 text-left" id="tablareserve"
                                        style="width: 94%;margin: 0 auto;">
                                        <thead>
                                            <tr>
                                                <th class="cell">Nombre Completo</th>
                                                <th class="cell">Referencia</th>
                                                <th class="cell">Numero de Mesa</th>
                                                <th class="cell">Dia</th>
                                                <th class="cell">Hora</th>
                                                <th class="cell"></th>
                                                <th class="cell"></th>
                                                <th class="cell" hidden></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($AllOrder as $item)
                                                <tr>
                                                    <td class="cell">{{ $item->nombre }}
                                                        {{ $item->apellidos }}</td>
                                                    <td class="cell">{{ $item->referencia }}</td>
                                                    <td class="cell">{{ $item->Numeromesa }}</td>
                                                    <td class="cell">{{ $item->fecha }}</td>
                                                    @if ($item->Hora == 0)
                                                        <td class="cell">Almuerzo</td>
                                                    @else
                                                        <td class="cell">Cena</td>
                                                    @endif
                                                    <td class="cell" hidden>{{ $item->id }}</td>
                                                    <td class="cell "><a class="btn btn-primary text-white"
                                                            href="{{ route('editreserve', $item->id) }}"> Ver Más</a>
                                                    </td>
                                                    <td class="cell">
                                                        <form action="{{ route('deletereserve', $item->id) }}"
                                                            method="POST" class="formulario" id="deleteAlert">
                                                            @csrf
                                                            <button type="submit"
                                                                class="deleteAlert formulario btn btn-danger">Eliminar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{-- @endisset --}}
                                        </tbody>
                                    </table>
                                </div>
                                <!--//table-responsive-->

                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                        {{-- <nav class="app-pagination">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav> --}}
                        <!--//app-pagination-->

                    </div>
                    <!--//tab-pane-->

                    <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                        <div class="app-card app-card-orders-table mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">

                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Nombre Completo</th>
                                                <th class="cell">Referencia</th>
                                                <th class="cell">Numero de Mesa</th>
                                                <th class="cell">Dia</th>
                                                <th class="cell">Hora</th>
                                                <th class="cell"></th>
                                                <th class="cell"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @isset($AllOrder) --}}

                                            @foreach ($AllOrder as $item)
                                                <tr>
                                                    <td class="cell">{{ $item->nombre }}
                                                        {{ $item->apellidos }}</td>
                                                    <td class="cell">{{ $item->referencia }}</td>
                                                    <td class="cell">{{ $item->ID_Mesa }}</td>
                                                    <td class="cell">{{ $item->fecha }}</td>
                                                    @if ($item->Hora == 0)
                                                        <td class="cell">Almuerzo</td>
                                                    @else
                                                        <td class="cell">Cena</td>
                                                    @endif
                                                    <td class="cell"><a class="btn-sm app-btn-secondary"
                                                            href="#">View</a></td>
                                                </tr>
                                            @endforeach
                                            {{-- @endisset --}}
                                        </tbody>
                                    </table>
                                </div>
                                <!--//table-responsive-->
                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//tab-pane-->

                    <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
                        <div class="app-card app-card-orders-table mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Nombre Completo</th>
                                                <th class="cell">Referencia</th>
                                                <th class="cell">Numero de Mesa</th>
                                                <th class="cell">Dia</th>
                                                <th class="cell">Hora</th>
                                                <th class="cell"></th>
                                                <th class="cell"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @isset($AllOrder) --}}

                                            @foreach ($AllOrder as $item)
                                                <tr>
                                                    <td class="cell">{{ $item->nombre }}
                                                        {{ $item->apellidos }}</td>
                                                    <td class="cell">{{ $item->referencia }}</td>
                                                    <td class="cell">{{ $item->ID_Mesa }}</td>
                                                    <td class="cell">{{ $item->fecha }}</td>
                                                    @if ($item->Hora == 0)
                                                        <td class="cell">Almuerzo</td>
                                                    @else
                                                        <td class="cell">Cena</td>
                                                    @endif
                                                    <td class="cell"><a class="btn-sm app-btn-secondary"
                                                            href="#">View</a></td>
                                                </tr>
                                            @endforeach
                                            {{-- @endisset --}}
                                        </tbody>
                                    </table>
                                </div>
                                <!--//table-responsive-->
                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//tab-pane-->
                    <div class="tab-pane fade" id="orders-cancelled" role="tabpanel"
                        aria-labelledby="orders-cancelled-tab">
                        <div class="app-card app-card-orders-table mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left" id="tablareserve">
                                        <thead>
                                            <tr>
                                                <th class="cell">Nombre Completo</th>
                                                <th class="cell">Referencia</th>
                                                <th class="cell">Numero de Mesa</th>
                                                <th class="cell">Dia</th>
                                                <th class="cell">Hora</th>
                                                <th class="cell"></th>
                                                <th class="cell"></th>
                                                <th class="cell" hidden></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Hoyorder as $item)
                                                <tr>
                                                    <td class="cell">{{ $item->nombre }}
                                                        {{ $item->apellidos }}</td>
                                                    <td class="cell">{{ $item->referencia }}</td>
                                                    <td class="cell">{{ $item->ID_Mesa }}</td>
                                                    <td class="cell">{{ $item->fecha }}</td>
                                                    @if ($item->Hora == 0)
                                                        <td class="cell">Almuerzo</td>
                                                    @else
                                                        <td class="cell">Cena</td>
                                                    @endif
                                                    <td class="cell" hidden>{{ $item->id }}</td>
                                                    <td class="cell "><a class="btn btn-primary text-white"
                                                            href="{{ route('editreserve', $item->id) }}"> Ver Más</a>
                                                    </td>
                                                    <td class="cell">
                                                        <form action="{{ route('deletereserve', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                class="deleteAlert btn btn-danger">Eliminar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{-- @endisset --}}
                                        </tbody>
                                    </table>
                                </div>
                                <!--//table-responsive-->
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
        {{-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <link rel="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script> --}}

        <script>
            // import swal from 'sweetalert2';
            // window.Swal = swal;

            $(document).ready(function() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })

                // $('.formulario').click(function(e) {

                //     e.preventDefault();
                //     Swal.fire({
                //         title: '¿Estás Seguro?',
                //         text: "¡Los cambios no se podrán revertir!",
                //         icon: 'warning',
                //         showCancelButton: true,
                //         confirmButtonColor: '#3085d6',
                //         cancelButtonColor: '#d33',
                //         confirmButtonText: 'Sí, ¡elimínalo!'
                //     }).then((result) => {
                //         if (result.isConfirmed) {

                //             this.submit();
                //         }
                //     })
                // });

            });
        </script>
    @endsection
