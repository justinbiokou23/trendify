<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    protected $fillable = ['user_id', 'type', 'nom', 'adresse', 'contact'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

