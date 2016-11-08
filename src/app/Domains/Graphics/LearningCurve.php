<?php

namespace App\Domains\Graphics;

use App\Domains\Graphics\Presenters\LearningCurvePresenter;
use Jenssegers\Mongodb\Eloquent\Model;
use Codecasts\Presenter\Presentable;

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
