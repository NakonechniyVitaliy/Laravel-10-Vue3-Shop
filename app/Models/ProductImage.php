<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    protected $table = 'product_images';
    protected $guarded = false;
    use HasFactory;

    public function getProductImagesUrlAttribute()
    {
        return url('storage/' . $this->file_path);
    }
}
