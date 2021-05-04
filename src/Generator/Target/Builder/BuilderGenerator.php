<?php

declare(strict_types=1);

namespace Shovhan\Generator\Generator\Target\Builder;

use Illuminate\Database\Eloquent\Builder;
use Shovhan\Generator\Generator\Generator;
use Shovhan\Generator\Generator\Model;

final class BuilderGenerator implements Generator
{
    public function generateForModel(Model $model): string
    {

    }

    public function hasCustomClass(Model $model): bool
    {
        return $model->hasOwnMethod('newEloquentBuilder')
            && $this->getCustomClass($model) !== Builder::class;
    }

    public function getCustomClass(Model $model): string
    {
        return get_class($model->getModel()->newQuery());
    }
}
