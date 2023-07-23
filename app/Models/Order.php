<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = ['price' => 'decimal:2','charge_amount' => 'decimal:2','collect_price' => 'decimal:2','charge_percentage'=>'decimal:2'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Product::class)->with('subSubCategory');
    }
}
