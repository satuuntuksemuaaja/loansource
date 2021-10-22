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
     * @return string
     */
    public function getAddressFormattedAttribute(): string
    {
        $address = $this->getAttribute('address');
        $city = $this->getAttribute('city');
        $state = $this->getAttribute('state_code');
        $zip = $this->getAttribute('zipcode');

        return "{$address} {$city} {$state}, {$zip}";
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeGetStates(Builder $builder): Builder
    {
        return $builder->selectRaw("DISTINCT(state_code) AS code, state_name AS name")
            ->orderBy('code');
    }

    /**
     * @param Builder $builder
     * @param string $state
     * @return Builder
     */
    public function scopeGetCities(Builder $builder, string $state): Builder
    {
        return $builder->selectRaw("DISTINCT(city) AS name, state_code, state_name")
            ->where('state_code', $state)
            ->orderBy('name');
    }

    /**
     * @param Builder $builder
     * @param string $state
     * @param string $city
     * @return Builder
     */
    public function scopeGetCompanies(Builder $builder, string $state, string $city): Builder
    {
        return $builder
            ->where('state_code', $state)
            ->where('city', $city)
            ->orderBy('company');
    }
}
