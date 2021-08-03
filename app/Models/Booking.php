<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['user_id', 'business_id', 'category_id', 'item_id', 'nosfm', 'nosfw', 'booking_date', 'status'];

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->hasMany(Item::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }
}
