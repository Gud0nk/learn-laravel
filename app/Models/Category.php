<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // для какой таблицы данная модел
    protected $table = 'categories';

    // поля для массвого заполнения ( все кроме ид, креатед ат, апдатед ат, делетед ат)
    protected $fillable = [
        'name',
    ];

    protected function casts(): array
    {
        return [
            //'name' => 'required|string',
        ];
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
