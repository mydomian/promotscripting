<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HireDeveloper extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function from_user(){
        return $this->belongsTo(User::class,'from_id');
    }
    public function to_user(){
        return $this->belongsTo(User::class,'to_id');
    }
}
