<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva extends Model
{
    use HasFactory;

    protected $table='reserva';
    protected $fillable=['referencia','hora','fecha','nombre','apellidos','email','DNI','telefono'];



public function mesas(){
    return $this->belongsTo('App\Models\mesas','ID_Mesa');
    
}
}