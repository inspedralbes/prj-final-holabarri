<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Subcategoria extends Model {
        public $timestamps = false;
        protected $fillable = [
            'categoria_id',
            'name'
        ];

        public function categoria() {
            return $this->belongsTo(Categoria::class, 'categoria_id');
        }

        public function productos() {
            return $this->hasMany(Producto::class, 'subcategoria_id', 'id');
        }
    }