<?php

namespace App\Domains\Graphics;

use Jenssegers\Mongodb\Eloquent\Model;

class FrameworkRadar extends Model
{
    /**
     * The collection associated with the model.
     *
     * @var string
     */
    protected $collection = 'thoughtworks_radar';

    /**
     * The attributes that are mass assign'able.
     *
     * @var array
     */
    protected $fillable = ['slug', 'name', 'counter'];

}
