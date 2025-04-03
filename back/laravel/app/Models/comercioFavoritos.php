<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class comercioFavoritos extends Model {
        use hasFactory;
        
        protected $table = 'comercios_favoritos';
        protected $fillable = ['cliente_id', 'comercio_id'];

        public function cliente() {
            return $this->belongsTo(Cliente::class);
        }

        public function comercio() {
            return $this->belongsTo(Comercio::class);
        }
    }
