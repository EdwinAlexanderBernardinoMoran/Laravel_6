<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Un usuario tiene muchos post
    public function posts(){
        return $this->hasMany(Post::class);
    }

    // Esta funcion sirve para alterar la informacion de manera visual en pantalla.
    // Convierte todos los nombres de los usuarios en letras mayusculas.
    public function getGetNameAttribute()
    {
        return strtoupper($this->name);
    }

    // Cuando queramos salvar dentro del campo name se activara este metodo.
    // Todo se convertira en minuscula
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
