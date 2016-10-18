<?php

namespace App\Domains\Trends\Transformers;

use App\Domains\Trends\Trend;
use League\Fractal\TransformerAbstract as Transformer;

class TrendTransformer extends Transformer
{
    public function transform(Trend $trend)
    {
        return [
            'id'         => $trend->id,
            'repository' => $trend->repository,
            'language'   => $trend->language,
            'stars'      => $trend->stars,
            'forks'      => $trend->forks,
        ];
    }
}
