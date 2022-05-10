<?php

namespace App\Models;
use App\Models\BaseModel;

class Products extends BaseModel
{
    protected $table = "product";

    public static function getLatestProducts(): \Illuminate\Database\Eloquent\Collection
    {
        return self::query()
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();
    }
}