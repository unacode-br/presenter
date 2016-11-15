<?php

namespace App\Domains\Graphics\Repositories;

use App\Domains\Graphics\Transformers\TrendTransformer;
use App\Domains\Graphics\Trend;
use Artesaos\Warehouse\AbstractCrudRepository;
use App\Domains\Graphics\Contracts\TrendRepository as TrendRepositoryContract;
use Artesaos\Warehouse\Traits\ImplementsFractal;

class TrendRepository extends AbstractCrudRepository implements TrendRepositoryContract
{
    use ImplementsFractal;

    protected $modelClass = Trend::class;

    protected $transformerClass = TrendTransformer::class;
}
