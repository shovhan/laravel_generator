<?php

declare(strict_types=1);

namespace Shovhan\Generator\Tests\Mock\Generator;

use Illuminate\Database\Eloquent\Model;

class MockModelWithBuilderFactoryMethod extends Model
{
    public function newEloquentBuilder($query): MockBuilder
    {
        return new MockBuilder($query);
    }
}
