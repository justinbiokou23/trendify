<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'méthode', 'statut', 'date'];

    // 🔗 Paiement associé à une commande
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

