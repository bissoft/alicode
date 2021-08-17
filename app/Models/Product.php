<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function attributes()
    {
        return $this->hasMany(ProductsAttributes::class , 'product_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImages::class , 'product_id');
    }
}
