<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Carrito extends Component
{
    public $productos=[];
  public $totalVenta;

   protected $listeners=['productoAgregado'=>'actualizarCarrito'] ;

   public function mount(){
    $this->productos=Session::get('cart',[]);
    $this->calcularTotalVenta();
    
   }

   public function vaciarCarrito(){
    Session::forget('cart');
    $this->productos=[];
    //emitir evento producto agregado 
     $this->dispatch('productoAgregado');
   }  
   

   public function actualizarCarrito(){
    $this->productos=Session::get('cart',[]);
    $this->calcularTotalVenta();
   }

   public function calcularTotalVenta(){
    $this->totalVenta = 0;
    foreach ($this->productos as $item) {
      if (isset($item['producto']->precio) && isset($item['cantidad'])) {
            $this->totalVenta += $item['producto']->precio * $item['cantidad'];
        }
 }

}
    public function render()
    {
        return view('livewire.carrito');
    }
}
