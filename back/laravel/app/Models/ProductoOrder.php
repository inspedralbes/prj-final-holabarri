<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class ProductoOrder extends Model {
        use HasFactory;
        public $timestamps = false;

        protected $fillable = [
            'order_comercio_id',
            'producto_id',
            'cantidad',
            'precio'
        ];

        public function orderComercio() {
            return $this->belongsTo(Order::class, 'order_comercio_id');
        }

        public function producto() {
            return $this->belongsTo(Producto::class, 'producto_id');
        }
    }