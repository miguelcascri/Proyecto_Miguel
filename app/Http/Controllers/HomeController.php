<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clientes;
use App\Models\reserva;
use App\Models\comentarios;
use App\Models\mesas;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $caj = reserva::all();
        $caj1 = mesas::all();
        $caj2 = comentarios::all();

        $mostrarreserva= DB::select("SELECT * FROM `reserva` LIMIT 5;");
        $mostrarcoment = DB::select("SELECT * FROM `comentarios` LIMIT 5;");

        $Numreserve = sizeof($caj);
        $NumMesa = sizeof($caj1);
        $NumComent = sizeof($caj2);
        
        
        return view('admin/home')->with(compact('Numreserve','NumMesa','NumComent','mostrarreserva','mostrarcoment'));
    }
}
