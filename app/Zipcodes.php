<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zipcodes extends Model
{

    /**
     * @var array
     */
    public $fillable = [
        'zip',
        'latitude',
        'longitude',
        'city',
        'state_id',
        'state_name',
        'zcta',
        'parent_zcta',
        'population',
        'density',
        'county_fips',
        'county_name',
        'county_weight',
        'all_county_weights',
        'imprecise',
        'military'
    ];

    
    
}
