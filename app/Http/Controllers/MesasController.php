<?php

namespace App\Http\Controllers;

use App\Models\mesas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesasController extends Controller
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
        $TodasMesas = mesas::all();

        $fechahoy = date('Y-m-d');
        // $originalDate = $fechahoy;
        // $newDate = date("Y-d-m", strtotime($originalDate));
        // dd($newDate);
        $AllMesas = DB::select("SELECT mesas.id, mesas.Comensales, mesas.Numeromesa FROM `reserva`, mesas WHERE fecha = '$fechahoy'  AND reserva.ID_Mesa = mesas.id ");

        $contar = count($AllMesas);

        // dd($contar);

        return view('admin/adminmesas')->with(compact('AllMesas', 'TodasMesas'));
        // return view('admin/adminmesas');

    }


    public function reservemesas($id)
    {

        $reservemesa = DB::select("SELECT * FROM mesas,`reserva` WHERE ID_Mesa = $id AND ID_Mesa = mesas.id ORDER BY fecha DESC;");

        return view('admin/ViewMesasReserve')->with(compact('reservemesa'));
    }

    public function updatemesa($id){
             
        $allmesas = mesas::all();

        $mesaedit = mesas::find($id);
        return view('admin/editMesa')->with(compact('mesaedit','allmesas'));
    }

    public function editmesa(Request $request, $id)
    {
        $mesa = mesas::find($id);

        $mesa->Numeromesa = $request->input('Numeromesa');
        $mesa->Comensales = $request->input('Comensales');
        $mesa->save();
        $mesa = mesas::all();
        
        return redirect('admin/adminmesas');
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
        $coment = new mesas();
        $coment -> Numeromesa = $request->input('Numeromesa');
        $coment->comensales = $request->input('comensales');

        $coment->save();

        $TodasMesas = mesas::all();

        $fechahoy = date('Y-m-d');
        // $originalDate = $fechahoy;
        // $newDate = date("Y-d-m", strtotime($originalDate));
        // dd($newDate);
        $AllMesas = DB::select("SELECT mesas.id, mesas.Comensales, mesas.NumeroMesa FROM `reserva`, mesas WHERE fecha = '$fechahoy'  AND reserva.ID_Mesa = mesas.id ");

        return redirect('admin/adminmesas');
    }


    public function deletemesa($id)
    {
        $reserve = mesas::find($id);
        $reserve->delete();

        return redirect('admin/adminmesas');
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
}
