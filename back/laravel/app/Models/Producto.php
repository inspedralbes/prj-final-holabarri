<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Producto extends Model {
        use HasFactory;
        public $timestamps = false;

        protected $fillable = [
            'subcategoria_id',
            'comercio_id',
            'nombre',
            'descripcion',
            'precio',
            'stock',
            'visible',
            'imagen'
        ];

        public function subcategoria() {
            return $this->belongsTo(Subcategoria::class, 'subcategoria_id');
        }

        public function comercio() {
            return $this->belongsTo(Comercio::class, 'comercio_id');
        }
    }