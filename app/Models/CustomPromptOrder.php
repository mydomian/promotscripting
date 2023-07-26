<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPromptOrder extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = ['price' => 'decimal:2','charge_percentage' => 'decimal:2','charge_amount' => 'decimal:2','collected_price'=>'decimal:2'];

    public function user(){
        return $this->belongsTo(User::class,'seller_id');
    }

}
