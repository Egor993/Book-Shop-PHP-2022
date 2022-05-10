<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use \Illuminate\Database\Eloquent\Model;

/**
 * @method static Builder where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder create(array $attributes = [])
 * @method public Builder update(array $values)
 * @method static Builder whereIn($column, $values)
 */

class BaseModel extends Model {
}