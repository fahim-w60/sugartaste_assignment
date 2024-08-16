<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'products';

    public function multi_images()
    {
        return $this->hasMany(MultiImage::class, 'product_id', 'id');
    }
}
