<?php

namespace App\Domains\Graphics\Transformers;

use App\Domains\Graphics\Trend;
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
