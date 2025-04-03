<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class EstatCompra extends Model {
        protected $fillable = [
            'nombre', 
            'color'
        ];

        public function orders() {
            return $this->hasMany(Order::class, 'estat');
        }
    }