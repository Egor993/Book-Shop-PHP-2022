<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Collection;

class Products extends BaseModel
{
    public static function getLatestProducts(): Collection
    {
        return self::query()
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();
    }
}