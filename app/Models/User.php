<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $fillable = [
        'name',
        'email',
        'telephone',
        'sexe',
        'date_naissance',
        'photo',
        'password',
        'role',
        'status',
    ];
    public function adresses()
    {
        return $this->hasMany(\App\Models\Adresse::class);
    }
}
