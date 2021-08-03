<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMenu extends Model
{
    protected $fillable = ['item_id', 'price'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

}
