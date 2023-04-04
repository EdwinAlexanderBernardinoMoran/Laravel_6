<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Un Post pertenece a un usuario.
    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function getGetTitleAttribute()
    // {
    //     return strtoupper($this->title);
    // }

    // Completamos solo la primer letra del titulo en mayuscula
    public function getGetTitleAttribute()
    {
        return ucfirst($this->title);
    }

    // Cuando queramos salvar dentro del campo name se activara este metodo.
    // Todo se convertira en minuscula
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }
}
