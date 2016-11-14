<?php

namespace App\Domains\Graphics\Presenters;

use Codecasts\Presenter\Presenter;
use Illuminate\Support\Str;

/**
 * Class TrendPresenter.
 */
class TrendPresenter extends Presenter
{
    public function normalizedName()
    {
        return ucwords(Str::lower($this->entity->name));
    }
}
