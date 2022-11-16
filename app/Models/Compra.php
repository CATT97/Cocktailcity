<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Direccion()
    {
        return $this->belongsTo(Direccion::class);
    }
}
