<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Categoria extends Model {

        protected $fillable = [
            'name',
            'imagenes',
        ];

        public function comercios() {
            return $this->hasMany(Comercio::class, 'categoria_id', 'id');
        }
    }