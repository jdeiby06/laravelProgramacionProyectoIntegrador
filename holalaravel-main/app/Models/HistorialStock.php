<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; 

class HistorialStock extends Model
{
    protected $table = 'historial_stock';
    protected $fillable = ['producto_id', 'usuario_id', 'cantidad_anterior', 'cantidad_nueva', 'motivo'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
        
    }
}