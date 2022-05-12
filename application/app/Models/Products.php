<?php

namespace App\Models;
use App\Models\BaseModel;

class Products extends BaseModel
{
    public static function getLatestProducts(): \Illuminate\Database\Eloquent\Collection
    {
        return self::query()
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();
    }
}