<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPromptOrder extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = ['price' => 'decimal:2','charge_percentage' => 'decimal:2','charge_amount' => 'decimal:2','collected_price'=>'decimal:2'];

    public function from_user(){
        return $this->belongsTo(User::class,'from_id');
    }

    public function to_user(){
        return $this->belongsTo(User::class,'to_id');
    }

}
