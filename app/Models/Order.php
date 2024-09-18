<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Order can have many products (many-to-many relationship)
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
