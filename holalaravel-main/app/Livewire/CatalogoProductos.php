<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;
class CatalogoProductos extends Component
{
    
      use WithPagination;

     public $search="";

    public function addToCart($productoId){
        $producto=Producto::find($productoId);
      
       if(Session::has('cart')) {
        $cart=Session::get('cart');
        if(array_key_exists($productoId,$cart)){
            $cart[$productoId]['cantidad']+=1;
        }else{
            $cart[$productoId]=[
                'producto'=>$producto,
                'cantidad'=>1
            ];
        }
       }else{
        $cart=[
            $productoId=>[
                'producto'=>$producto,
                'cantidad'=>1
            ]
            ];
       }
       Session::put('cart',$cart);
       //emitir evento para comumicarse con otros componentes de livewire
       $this->dispatch('productoAgregado');

    }



    public function render()
    {
          $productos = Producto::where('stock', '>', 0)
        ->where('nombre', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'DESC')->paginate(2);
        return view('livewire.catalogo-productos',compact('productos'));
    }
}
