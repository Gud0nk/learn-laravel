<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Photo extends Model
{
    protected $fillable = [
        'name',
        'product_id',
    ];

    // m:1 многие к одному
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    // 1:m
    public function product(): HasMany {
        return $this->hasMany(Photo::class);
    }
}
