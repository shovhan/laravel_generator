<?php

declare(strict_types=1);

namespace Shovhan\Generator\Tests\Generator\ModelTest;

use Shovhan\Generator\Generator\Model;
use Shovhan\Generator\Generator\ModelException;
use Shovhan\Generator\Tests\TestCase;

final class CreateModelTest extends TestCase
{
    public function testThatCannotCreateModelWithNotExistingClass(): void
    {
        $className = 'UndefinedClass';
        $this->expectExceptionObject(
            ModelException::classNotExists($className)
        );

        new Model($className);
    }

    public function testThatCannotCreateModelIfItIsNotAModel(): void
    {
        $className = get_class(new class {});
        $this->expectExceptionObject(
            ModelException::classIsNotModel($className)
        );

        new Model($className);
    }
}
