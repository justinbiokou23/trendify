<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'description', 'prix', 'image', 'stock', 'categorie_id','promo_semaine'
    ];

    // 🔗 Produit appartient à une catégorie
    public function categorie()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    // 🔗 Produit peut appartenir à plusieurs commandes
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
