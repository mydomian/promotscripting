<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'budget' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function jobPostImages()
    {
        return $this->hasMany(JobPostImage::class)->whereNotNull('image');
    }

    public function bids(){
        return $this->hasMany(Bid::class)->with('user');
    }
}
