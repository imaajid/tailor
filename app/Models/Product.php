<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'description', 'image', 'category_id', 'item_id', 'business_id', 'price', 'in_stock', 'discount', 'brand_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }
}
