<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class OrderComercio extends Model {
        protected $fillable = [
            'order_id',
            'comercio_id',
            'subtotal',
            'estat',
        ];

        public function productosCompra() {
            return $this->hasMany(ProductoOrder::class, 'order_comercio_id');
        }

        public function estatCompra() {
            return $this->belongsTo(EstatCompra::class, 'estat');
        }

        public function comercio() {
            return $this->belongsTo(Comercio::class, 'comercio_id');
        }

        public function order() {
            return $this->belongsTo(Order::class, 'order_id');
        }
    }