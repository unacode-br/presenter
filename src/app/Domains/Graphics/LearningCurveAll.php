<?php

namespace App\Domains\Graphics;

use App\Domains\Graphics\Presenters\LearningCurvePresenter;
use Jenssegers\Mongodb\Eloquent\Model;
use Codecasts\Presenter\Presentable;

class LearningCurveAll extends Model
{
    use Presentable;

    /**
     * The collection associated with the model.
     *
     * @var string
     */
    protected $collection = 'learning_curve_all';

    /**
     * @var string Trend Presenter class
     */
    protected $presenter = LearningCurvePresenter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['language', 'tag', 'point'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'point' => 'float',
    ];

    /**
     * Get the top languages from learning curve.
     * @param int $limit
     * @return mixed
     */
    public static function getTopLanguages($limit = 15)
    {
        return LearningCurveAll::orderBy('point', 'desc')
            ->take($limit)
            ->get([
                'language.name',
                'point',
            ]);
    }
}
