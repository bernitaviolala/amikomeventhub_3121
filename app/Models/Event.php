<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'date',
        'location',
        'price',
        'stock',
        'poster_path'
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    // Menandakan bahwa 1 Event dimiliki oleh 1 Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
