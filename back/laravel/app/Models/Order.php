<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Order extends Model {
        protected $fillable = [
            'cliente_id',
            'total',
            'tipo_envio',
            'tipo_pago',
            'estat',
        ];

        public function cliente() {
            return $this->belongsTo(Cliente::class, 'cliente_id');
        }

        public function tipoEnvio() {
            return $this->belongsTo(TipoEnvio::class, 'tipo_envio');
        }

        public function TipoPago() {
            return $this->belongsTo(TipoPago::class, 'tipo_pago');
        }

        public function estatCompra() {
            return $this->belongsTo(EstatCompra::class, 'estat');
        }

        public function orderComercios() {
            return $this->hasMany(OrderComercio::class, 'order_id');
        }
    }