<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
    ];

    public function products_seasons()
    {
        return $this->belongsToMany(Season::class);
    }

    public function updateProduct($request, $product)
    {
        $result = $product->fill([
            'product_name' => $request->product_name
        ])->save();

        return $result;
    }
}
