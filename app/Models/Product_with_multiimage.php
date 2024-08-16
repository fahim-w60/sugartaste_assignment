<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_with_multiimage extends Model
{
    use HasFactory;
    protected $table="product_with_multi_images";
    public function image_detail()
    {
        return $this->hasOne(MultiImage::class, 'id','multiImage_id');
    }
}
