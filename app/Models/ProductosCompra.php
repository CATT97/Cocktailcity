<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosCompra extends Model
{
    use HasFactory;

    public function Compra()
    {
        return $this->belongsTo(Compra::class);
    }

    public function Productos()
    {
        return $this->belongsTo(Productos::class);
    }
}
