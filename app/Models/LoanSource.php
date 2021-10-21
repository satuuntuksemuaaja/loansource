<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanSource extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    public $guarded = ['id'];

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeGetStates(Builder $builder): Builder
    {
        return $builder->selectRaw("DISTINCT(state) AS code, state_name AS name")
            ->orderBy('code');
    }
}
