@extends('admin.layouts.theme')

@section('content')
    <style>
        .tableclientscroll {
            overflow-x: hidden;
        }

        #tablaclient_filter {
            margin-left: 60%;
        }

        #tablaclient_wrapper {
            margin-left: 2%;
        }

        @media(max-width:768px) {
            .tableclientscroll {
                overflow-x: auto;
            }
        }
    </style>

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">GESTION DE CLIENTES</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                {{-- <div class="col-auto">
                                    <form class="table-search-form row gx-1 align-items-center" action="/admin/adminclientes/buscar" method="POST">
                                        @csrf
                                        <div class="col-auto">
                                            <input type="text" id="search-orders" name="buscar" class="form-control search-orders" placeholder="Buscar">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn app-btn-secondary">Buscar</button>
                                        </div>

                                </div> --}}
                                <!--//col-->
                                {{-- <div class="col-auto">

                                    <select class="form-select w-auto">
                                        <option selected value="option-1">All</option>
                                        <option value="option-2">This week</option>
                                        <option value="option-3">This month</option>
                                        <option value="option-4">Last 3 months</option>

                                    </select>
                                </div> --}}
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
                                        onclick="exportTableToExcel('clientIDtbl', 'clientes')">Exportar a Excel</button> --}}

                                    {{-- <script>
                                        function exportTableToExcel(clientIDtbl, filename = 'clientes') {
                                            var downloadLink;
                                            var dataType = 'application/vnd.ms-excel';
                                            var tableSelect = document.getElementById(clientIDtbl);
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
                                    </script> --}}
                                </div>

                            </div>
                            <!--//row-->
                        </div>
                        <!--//table-utilities-->
                    </div>
                    <!--//col-auto-->
                </div>
                <!--//row-->


                {{-- <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
                <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Paid</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Pending</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Cancelled</a>
            </nav> --}}


                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab"
                        style=" box-shadow: -10px 0px 13px -7px #0000002e, 10px 0px 13px -7px #0000002e,  0px 0px 4px -23px rgb(0 0 0 / 0%);">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive tableclientscroll">
                                    <table class="table app-table-hover mb-0 text-left" id="tablaclient">
                                        <thead>
                                            <tr>
                                                <th class="cell">Nombre</th>
                                                <th class="cell">Apellidos</th>
                                                <th class="cell">Email</th>
                                                <th class="cell">DNI</th>
                                                <th class="cell">Telefono</th>
                                                <th class="cell"></th>
                                                <th class="cell"></th>
                                                <th class="cell"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @isset($AllOrder) --}}

                                            @foreach ($AllClients as $item)
                                                <tr>
                                                    <td class="cell">{{ $item->nombre }}</td>
                                                    <td class="cell">{{ $item->apellidos }}</td>
                                                    <td class="cell">{{ $item->email }}</td>
                                                    <td class="cell">{{ $item->DNI }}</td>
                                                    <td class="cell">{{ $item->telefono }}</td>
                                                    <td class="cell" hidden>{{ $item->id }}</td>
                                                    <td class="cell "><a class="btn btn-primary text-white"
                                                            href="{{ route('editClient', $item->id) }}">Ver Más</a></td>
                                                    <td class="cell">
                                                        <form action="{{ route('deleteclient', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Eliminar</button>
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
                    </nav><!--//app-pagination--> --}}

                    </div>
                    <!--//tab-pane-->


                </div>
                <!--//tab-content-->



            </div>
            <!--//container-fluid-->
        </div>
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
        <!--//app-content-->
    @endsection
