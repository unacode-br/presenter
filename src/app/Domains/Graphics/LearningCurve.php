<?php

namespace App\Domains\Graphics;

use Jenssegers\Mongodb\Eloquent\Model;

class LearningCurve extends Model
{
    /**
     * The collection associated with the model.
     *
     * @var string
     */
    protected $collection = 'learning_curve';

    /**
     * The attributes that are mass assign'able.
     *
     * @var array
     */
    protected $fillable = ['language', 'tag', 'points'];

}
