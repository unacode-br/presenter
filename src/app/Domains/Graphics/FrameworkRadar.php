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

    public static function getTrendingFrameworks()
    {
        $radar = \Redis::get('graphic:radar');

        if ($radar == null) {
            $radar = FrameworkRadar::where('counter', '>', 0)->orderBy('sequence', 'asc')->take(15)->get();

            \Redis::set('graphic:radar', $radar);
        }

        return collect(json_decode($radar));
    }

}
