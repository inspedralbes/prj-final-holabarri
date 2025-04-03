<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class ciudades extends Model {
        protected $fillable = [
            'parent_code',
            'code',
            'label'
        ];
    }