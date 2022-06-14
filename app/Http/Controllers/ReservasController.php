<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reserva;
use App\Models\comentarios;
use Illuminate\Support\Facades\DB;
use PDF;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $fechahoy = date('Y-m-d');
        $Hoyorder = DB::select("SELECT nombre, apellidos, email ,DNI, telefono, mesas.id AS MESAID, reserva.id , referencia, Hora,fecha, ID_Mesa, Numeromesa FROM `reserva`, mesas WHERE reserva.fecha='$fechahoy' AND mesas.id = reserva.ID_Mesa ORDER BY reserva.created_at DESC");
        // $AllOrder = DB::select("SELECT * FROM `reserva`");
        // $AllOrder = DB::select('SELECT reserva.nombre, reserva.apellidos, reserva.referencia, reserva.id, reserva.ID_Mesa , reserva.fecha, reserva.Hora FROM `reserva`, mesas WHERE mesas.id = ID_Mesa ORDER BY ; ');
        $AllOrder = DB::select('SELECT nombre, apellidos, email ,DNI, telefono, mesas.id AS MESAID, reserva.id , referencia, Hora,fecha, ID_Mesa, Numeromesa FROM `reserva`,mesas WHERE mesas.id = reserva.ID_Mesa  ORDER BY reserva.created_at DESC;');
        // dd($AllOrder);
        // DD($AllOrder);
        return view('admin/adminreservas')->with(compact('Hoyorder', 'AllOrder'));
    }

    public function editreserve($id)
    {

        $allreserve = DB::select("SELECT nombre, apellidos, email ,DNI, telefono, mesas.id AS MESAID, reserva.id AS RESERVAID, referencia, Hora,fecha, ID_Mesa, Numeromesa FROM `reserva`,mesas WHERE mesas.id = reserva.ID_Mesa AND reserva.id = $id  ORDER BY reserva.created_at DESC;");
        // dd($allreserve);
        return view('admin/editreserve')->with(compact('allreserve'));
    }
    public function editClient($id)
    {

        $allreserve = DB::select("SELECT nombre, apellidos, email ,DNI, telefono, mesas.id AS MESAID, reserva.id AS RESERVAID, referencia, Hora,fecha, ID_Mesa, Numeromesa FROM `reserva`,mesas WHERE mesas.id = reserva.ID_Mesa AND reserva.id = $id  ORDER BY reserva.created_at DESC;");

        $comentclient = DB::select("SELECT comentarios.nombre, comentarios.email, comentarios.telefono, comentarios.estrellas, comentarios.descripcion FROM `comentarios`, reserva WHERE comentarios.email = reserva.email AND reserva.id = $id ORDER BY comentarios.created_at DESC;");

        // $reserve = reserva::find($id);
        return view('admin/editclient')->with(compact('allreserve', 'comentclient'));
    }

    public function indexComent()
    {
        $AllComents = DB::select("SELECT * FROM `comentarios` ORDER BY created_at DESC;");

        return view('admin/admincoments')->with(compact('AllComents'));
    }




    public function indexclient()
    {

        $AllClients = DB::select('SELECT nombre, apellidos, email ,DNI, telefono, mesas.id AS MESAID, reserva.id , referencia, Hora,fecha, ID_Mesa, Numeromesa FROM `reserva`,mesas WHERE mesas.id = reserva.ID_Mesa  ORDER BY reserva.created_at DESC;');


        // $AllOrder = DB::select("SELECT * FROM `reserva`");
        // $AllClients= reserva::all();
        // $AllClients = DB::select('SELECT * FROM `reserva` ORDER BY created_at DESC;');
        // dd($AllOrder);
        // DD($AllOrder);
        return view('admin/adminclientes')->with(compact('AllClients'));
    }


    public function updateReserve(Request $request, $id)
    {
        $reserva = reserva::find($id);

        $reserva->nombre = $request->input('nombre');
        $reserva->apellidos = $request->input('apellidos');
        $reserva->email = $request->input('email');
        $reserva->DNI = $request->input('DNI');
        $reserva->telefono = $request->input('telefono');
        $reserva->ID_Mesa = $request->input('ID_Mesa');
        $reserva->Hora = $request->input('Hora');
        $reserva->fecha = $request->input('fecha');
        $reserva->save();
        $reserva = reserva::all();

        return redirect('admin/adminreservas');
    }

    public function updateClient(Request $request, $id)
    {
        $reserva = reserva::find($id);

        $reserva->nombre = $request->input('nombre');
        $reserva->apellidos = $request->input('apellidos');
        $reserva->email = $request->input('email');
        $reserva->DNI = $request->input('DNI');
        $reserva->telefono = $request->input('telefono');
        $reserva->ID_Mesa = $request->input('ID_Mesa');
        $reserva->Hora = $request->input('Hora');
        $reserva->fecha = $request->input('fecha');
        $reserva->save();
        $reserva = reserva::all();

        return redirect('admin/adminclientes');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin/client')->with(compact('layout'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {



    //     return view('admin/reservas')->with(compact('AllOrder'));
    // }


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
    // public function mostrardisponibilidad($hora, $fecha ){

    //    $comprobe = DB::select("SELECT ID_Mesa FROM `reserva` WHERE Hora = $hora AND fecha = $fecha ");

    //     return view('/reserva')->with(compact('$comprobe'));
    //     return view('/');
    // }

    public function buscar_show(Request $request)
    {
        $AllClients = reserva::select("*")
            ->where('nombre', 'like', '%' . $request->buscar . '%')
            ->orWhere('apellidos', 'like', '%' . $request->buscar . '%')
            ->orWhere('referencia', 'like', '%' . $request->buscar . '%')
            ->orWhere('DNI', 'like', '%' . $request->buscar . '%')
            ->orWhere('email', 'like', '%' . $request->buscar . '%')->get();

        return view('admin/adminclientes')->with(compact('AllClients'));
    }


    public function buscar_reservas(Request $request)
    {
        $AllClients = reserva::select("*")
            ->where('nombre', 'like', '%' . $request->buscar . '%')
            ->orWhere('apellidos', 'like', '%' . $request->buscar . '%')
            ->orWhere('referencia', 'like', '%' . $request->buscar . '%')
            ->orWhere('DNI', 'like', '%' . $request->buscar . '%')
            ->orWhere('email', 'like', '%' . $request->buscar . '%')->get();

        return view('admin/adminclientes')->with(compact('AllClients'));
    }

    public function deletereserve($id)
    {
        $reserve = reserva::find($id);
        $reserve->delete();

        return redirect('admin/adminreservas');
    }

    public function deleteclient($id)
    {
        $reserve = reserva::find($id);
        $reserve->delete();

        return redirect('admin/adminclientes');
    }

    public function deletecoment($id)
    {
        $coment = comentarios::find($id);
        // $coment -> delete();

        return redirect('admin/admincoments ');
    }

    
}
