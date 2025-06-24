<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total', 'statut', 'date'];

    // 🔗 Commande appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 Commande a plusieurs items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // 🔗 Paiement associé à cette commande
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
