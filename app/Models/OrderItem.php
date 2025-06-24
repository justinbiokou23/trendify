<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantité', 'prix'];

    // 🔗 L'item appartient à une commande
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // 🔗 L'item concerne un produit
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
