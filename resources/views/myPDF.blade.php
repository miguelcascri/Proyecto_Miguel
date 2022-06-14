<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    {{-- <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i"
        rel="stylesheet"> --}}
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Comprobante de reserva</title>
</head>

<body>
    <div class="card mt-5" style="border: none">
        <div class="d-flex justify-content-around">
            <span>
                <h2>EDÉN Restaurante</h2>
            </span>
            <span>
                <h4>Comprobante de reserva</h4>
            </span>
            
        </div>
        <div class="card-body mt-5" style="width: 90%;margin: 0 auto;">
           <div>
            <h4>DATOS DE CLIENTE</h4>
            <table class="table">
               <thead class="thead-light">
                    <tr>
                        <th  class="cell">Nombre</th>
                        <th  class="cell">Apellidos</th>
                        <th  class="cell">Email</th>
                        <th  class="cell">DNI</th>
                        <th class="cell">Telefono</th>
                    </tr>
               </thead>
               <tbody>
                <tr>
                    <td class="cell">{{$nombre}}</td>
                    <td class="cell">{{$apellido}}</td>
                    <td class="cell">{{$email}}</td>
                    <td class="cell">{{$DNI}}</td>
                    <td class="cell">{{$telefono}}</td>
                </tr>
               </tbody>
           </table>
        </div>
           <div class="mt-5">
           <h4 class="mb-2">DATOS DE PEDIDO</h4>
            <table class="table mt-2">
               <thead class="thead-light">
                    <tr>
                        <th class="cell">Referencia</th>
                        <th class="cell">Hora</th>
                        <th  class="cell">Fecha</th>
                        <th  class="cell">Numero de Mesa</th>
                    </tr>
               </thead>
               <tbody>
                <tr>
                    <td class="cell">{{$ref}}</td>
                    @if($Hora == 0)
                    <td class="cell">Almuerzo</td>
                    @elseif($Hora == 1)
                    <td class="cell">Cena</td>
                    @endif
                    <td class="cell">{{$fecha}}</td>
                    <td class="cell">{{$mesanum}}</td>
                </tr>
               </tbody>
           </table>
        </div>
        <div>
            <p class="d-flex justify-content-center mt-5" style="margin-left: 25%"><b>Calle Cruz Conde, número 8, Córdoba</b> </p>
            <p class="d-flex justify-content-center mt-5" style="margin-left: 15%"><b>Mier-Dom: 13:00 AM - 17:00 PM / 20:30 PM - 00:00 AM</b></p>
        </div>
        </div>
    </div>

</body>

</html>