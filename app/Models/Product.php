<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'is_active',
        'image',
    ];

    // Local Scope 1: Filter Produk Aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Local Scope 2: Filter Produk yang Tersedia Stoknya
    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}