<?php
    namespace App\Models;
    use Laravel\Sanctum\HasApiTokens;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class User extends Authenticatable implements MustVerifyEmail {
        use HasFactory, Notifiable, HasApiTokens;

        protected $fillable = [
            'name',
            'apellidos',
            'email',
            'phone',
            'password',
            'street_address',
            'ciudad',
            'provincia',
            'codigo_postal',
            'numero_planta',
            'numero_puerta',
        ];

        protected $hidden = [
            'password',
            'remember_token',
            'email_verified_at',
            'phone_verified_at',
        ];

        protected $casts = [
            'email_verified_at' => 'datetime',
            'phone_verified_at' => 'datetime',
        ];
    }