<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
    
    protected $fillable=[
      'cliente_id','descuento','total','estado'
    ];
      //relacion con cliente
  public function cliente(){
    return $this->belongsTo(Cliente::class,'cliente_id');
  }
     //relacion con detelle ventas
  public function detalles(){
    return $this->hasMany(DetalleVenta::class, 'venta_id');
   }
}
