<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoPago extends Model
{
    use HasFactory;

        protected $fillable = [
            'nombre',
            'descripcion',
        ];

        public function orders() {
            return $this->hasMany(Order::class, 'tipo_envio');
        }
}
