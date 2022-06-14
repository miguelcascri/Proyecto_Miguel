<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use App\Models\reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Input;
use App\Models\comentarios;
use PDF;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        // $AllClients = clientes::all();
        $AllClients = DB::select("SELECT * FROM `clientes`");
        // $AllOrder = clientes::all();
        // dd($AllOrder);
        // DD($AllOrder);
        return view('admin/adminclientes')->with(compact('AllClients'));
        // return redirect()->route('admin/', [$AllClients]);


    }

    public function indexComentpublic()
    {
        $AllComents = DB::select("SELECT * FROM `comentarios` ORDER BY created_at DESC LIMIT 3;");

        return view('welcome')->with(compact('AllComents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $reserva = new reserva();
        $reserva->Hora = $request->input('Hora');
        $reserva->fecha =  $request->input('fecha');
        $reserva->nombre = $request->input('nombre');
        $reserva->apellidos = $request->input('apellidos');
        $reserva->email = $request->input('email');
        $reserva->telefono = $request->input('telefono');
        $reserva->DNI = $request->input('DNI');
        // $ref0 = \Str::random(3);
        // $ref1 =  \Str::random(3);
        // $ref2 =  \Str::random(3);





        $reserva->referencia = $request->input('referencia');
        //    dd($referencia);
        $reserva->ID_Mesa = $request->input('ID_Mesa');






        $Hora = $request->input('Hora');
        $fecha =  $request->input('fecha');
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $reference = $request->input('referencia');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $DNI = $request->input('DNI');



        $refexist = DB::select("SELECT referencia FROM `reserva` WHERE referencia = '$reference'");

        // $integer = intval($refexist);

        // dd($integer);
        if ($refexist == []) {
        } else {
            return redirect('/');
        }

        $reserva->save();




        $client = array($nombre, $apellidos, $DNI, $email, $telefono, $reference, $Hora, $fecha);

        // dd($client);
        // dd($reserva);

        return view('/confirm')->with(compact('reserva', 'Hora', 'fecha', 'nombre', 'apellidos', 'reference', 'email', 'telefono', 'DNI', 'client'));
    }

    public function storeComent(Request $request)
    {
        $coment = new comentarios();
        $coment->nombre = $request->input('nombre');
        $coment->email =  $request->input('email');
        $coment->telefono = $request->input('telefono');
        $coment->descripcion = $request->input('descripcion');
        $coment->estrellas = $request->input('estrellas');
        $coment->save();

        return redirect('/');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function disponibilidad(Request $request)
    {



        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $comensales = $request->input('comensales');

        $mesascompletas = DB::select("SELECT id, Comensales, Numeromesa FROM `mesas`");


        // $totalmesas = DB::select("SELECT mesas.id, mesas.Comensales,mesas.Numeromesa FROM `mesas`, reserva WHERE reserva.ID_Mesa != mesas.id AND reserva.fecha = '$fecha' AND reserva.Hora = $hora;");



        $comprobe = DB::select("SELECT * FROM `mesas` Where not exists (select * from reserva Where mesas.id = ID_Mesa AND reserva.fecha='$fecha' AND reserva.Hora = $hora)");
        // dd($comprobe);
        return view('/formreserva')->with(compact('fecha', 'hora', 'comprobe','mesascompletas'));
    }

    public function generatePDF($referencia)
    {

        // dd($client);
        // $apellidos;
        // dd($nombre, $apellidos);

        // dd($referencia);

        $fac = DB::select("SELECT * FROM `reserva` WHERE referencia = '$referencia'");


        $nombre = $fac[0]->nombre;
        $apellidos = $fac[0]->apellidos;
        $email = $fac[0]->email;
        $DNI = $fac[0]->DNI;
        $telefono = $fac[0]->telefono;
        $id = $fac[0]->id;
        $ID_Mesa = $fac[0]->ID_Mesa;
        $ref = $fac[0]->referencia;
        $Hora = $fac[0]->Hora;
        $fecha = $fac[0]->fecha;

        $Numeromesa = DB::select("SELECT Numeromesa FROM mesas,`reserva` WHERE ID_Mesa = mesas.id AND ID_Mesa = $ID_Mesa AND referencia = '$ref'");

        // dd($Numeromesa);

        $mesanum = $Numeromesa[0]->Numeromesa;

        $data = [


            'nombre' => $nombre,
            'apellido' => $apellidos,
            'email' => $email,
            'DNI' => $DNI,
            'telefono' => $telefono,
            'id' => $id,
            'ref' => $ref,
            'Hora' => $Hora,
            'fecha' => $fecha,
            'mesanum' => $mesanum
        ];

        // dd($client);
        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('Reserva.pdf');
        // return $pdf->download('factura.pdf')->with(compact('fac','nombre'));

    }
}
