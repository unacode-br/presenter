<?php

namespace App\Domains\Graphics;

use Jenssegers\Mongodb\Eloquent\Model;

class LanguagesIndex extends Model
{
    /**
     * The collection associated with the model.
     *
     * @var string
     */
    protected $collection = 'tiobe_index';

    /**
     * The attributes that are mass assign'able.
     *
     * @var array
     */
    protected $fillable = ['sequence', 'language', 'rating'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'rating' => 'float',
    ];

    public static function getIndexedLanguages()
    {
        $langs = \Redis::get('graphic:tiobe');

        if ($langs == null) {
            $langs = LanguagesIndex::orderBy('sequence', 'asc')->get();

            \Redis::set('graphic:tiobe', $langs);
        }

        return collect(json_decode(\Redis::get('graphic:tiobe')));
    }

}
