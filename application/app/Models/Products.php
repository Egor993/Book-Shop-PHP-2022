<?php

namespace Models;
use Models\BaseModel;

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