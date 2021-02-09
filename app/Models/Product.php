<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $appends = ['photo_url'];

    protected $fillable = [
        'name', 'category_id', 'slug', 'tags', 'photo', 'description', 'additional', 'color', 'size', 'weight', 'meta_description', 'meta_keywords', 'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function priceList()
    {
        return $this->hasMany(PriceList::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function Review()
    {
        return $this->hasMany(Review::class);
    }

    public function getPhotoUrlAttribute($value)
    {
        return asset('images/' . $this->photo);
    }
}
