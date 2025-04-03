<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Comercio extends Model {
        use HasFactory;

        protected $fillable = [
            'nombre',
            'idUser',
            'phone',
            'email',
            'email_verified_at',
            'calle_num',
            'ciudad',
            'provincia',
            'codigo_postal',
            'num_planta',
            'num_puerta',
            'categoria_id',
            'descripcion',
            'gestion_stock',
            'puntaje_medio',
            'latitude',
            'longitude',
            'horario',
            'ubicacion_verified_at',
            'imagen',
        ];

        public function categoria() {
            return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
        }

        public function productos() {
            return $this->hasMany(Producto::class,'comercio_id');
        }

        public function orders() {
            return $this->hasMany(Order::class,'comercio_id');
        }
    }