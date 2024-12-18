<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class)->with('category');
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class);
    }

    public function tags(){
        return $this->hasMany(Tag::class);
    }

}
