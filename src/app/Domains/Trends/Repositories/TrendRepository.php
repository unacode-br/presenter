<?php

namespace App\Domains\Trends\Repositories;

use App\Domains\Trends\Transformers\TrendTransformer;
use App\Domains\Trends\Trend;
use Artesaos\Warehouse\AbstractCrudRepository;
use App\Domains\Trends\Contracts\TrendRepository as TrendRepositoryContract;
use Artesaos\Warehouse\Traits\ImplementsFractal;

class TrendRepository extends AbstractCrudRepository implements TrendRepositoryContract
{
    use ImplementsFractal;

    protected $modelClass = Trend::class;

    protected $transformerClass = TrendTransformer::class;
}
