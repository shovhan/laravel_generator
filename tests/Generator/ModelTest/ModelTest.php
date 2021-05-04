<?php

declare(strict_types=1);

namespace Shovhan\Generator\Tests\Generator\ModelTest;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Shovhan\Generator\Generator\Model;
use Shovhan\Generator\Tests\TestCase;

final class ModelTest extends TestCase
{
    public function testCanDetectOwnMethod(): void
    {
        $modelClass = new class extends EloquentModel {
            public function newEloquentBuilder($query)
            {
                return parent::newEloquentBuilder($query);
            }
        };

        $model = new Model(get_class($modelClass));

        self::assertTrue($model->hasOwnMethod('newEloquentBuilder'));
    }

    public function testCanDetectThatMethodNotExists(): void
    {
        $modelClass = new class extends EloquentModel {};

        $model = new Model(get_class($modelClass));

        self::assertFalse($model->hasOwnMethod('newEloquentBuilder'));
    }

    public function testCanReturnSingleModel(): void
    {
        $class = new class extends EloquentModel {};
        $model = new Model(get_class($class));
        self::assertEquals($class, $model->getModel());
    }
}
