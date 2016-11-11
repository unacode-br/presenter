<?php

namespace App\Domains\Graphics;

use App\Domains\Graphics\Presenters\TrendPresenter;
use Jenssegers\Mongodb\Eloquent\Model;
use Codecasts\Presenter\Presentable;
use Cache;

class Trend extends Model
{
    use Presentable;

    /**
     * The collection associated with the model.
     *
     * @var string
     */
    protected $collection = 'github_trends';

    /**
     * @var string Trend Presenter class
     */
    protected $presenter = TrendPresenter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['repository', 'language', 'stars', 'forks'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'stars' => 'int',
        'forks' => 'int',
    ];

    /**
     * Get the most stared repositories from Github Trends.
     * @param int $limit
     * @return mixed
     */
    public static function getMostStaredRepositories($limit = 10)
    {
        $stared = \Redis::get('graphic:stared');

        if ($stared == null) {
            $star = Trend::orderBy('stars', 'desc')
                ->take($limit)
                ->get([
                    'repository',
                    'language',
                    'stars',
                ]);

            \Redis::set('graphic:stared', $star);
        }

        return collect(json_decode(\Redis::get('graphic:stared')));
    }

    /**
     * Get the most forked repositories from Github Trends.
     * @param int $limit
     * @return mixed
     */
    public static function getMostForkedRepositories($limit = 10)
    {
        $forked = \Redis::get('graphic:forked');

        if ($forked == null) {
            $forked = Trend::orderBy('forks', 'desc')
                ->take($limit)
                ->get([
                    'repository',
                    'language',
                    'forks',
                ]);

            \Redis::set('graphic:forked', $forked);
        }

        return collect(json_decode(\Redis::get('graphic:forked')));

    }
}
