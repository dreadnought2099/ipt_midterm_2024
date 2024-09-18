<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Product belongs to many orders (many-to-many relationship)
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
