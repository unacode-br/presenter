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

    /**
     * Get all the languages.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getAllLanguages()
    {
        $langs = \Redis::get('graphic:learning:all_languages');

        if ($langs == null) {
            $languages = LearningCurve::orderBy('language.slug', 'asc')->get(['language.slug', 'language.name']);

            \Redis::set('graphic:learning:all_languages', $languages);
        }

        return collect(json_decode(\Redis::get('graphic:learning:all_languages')));
    }

    /**
     * Get the learning curve data by language.
     *
     * @param string $language
     * @return bool|\Illuminate\Support\Collection
     */
    public static function getLearningCurveByLanguage($language = 'actionscript')
    {
        $cache = \Redis::get('graphic:learning:' . $language);

        $languages = LearningCurve::getAllLanguages();

        if ($cache == null) {
            $language_p = LearningCurve::where('language.slug', strtolower($language))->first();

            if ($language_p) {
                $proportion = $language_p->points[0]['value'] / $language_p->points[1]['value'];

                $data = [
                    'language'   => $language_p,
                    'languages'  => $languages,
                    'proportion' => $proportion,
                ];

                \Redis::set('graphic:learning:' . $language, json_encode($data));

                return collect(json_decode(\Redis::get('graphic:learning:' . $language)));
            }

            return false;
        }

        return collect(json_decode($cache));
    }

}
