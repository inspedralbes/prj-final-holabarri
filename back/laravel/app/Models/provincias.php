<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class provincias extends Model {
        protected $fillable = [
            'code',
            'label'
        ];
    }