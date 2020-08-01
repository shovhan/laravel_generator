<?php

declare(strict_types=1);

namespace Shovhan\Generator\Generator\Common;

use Shovhan\Generator\AbstractGeneratorException;

final class ModelException extends AbstractGeneratorException
{
    public static function classNotExists(string $className): self
    {
        return new self("Model class [$className] not found");
    }

    public static function classIsNotModel(string $className): self
    {
        return new self("Class [$className] should extend Model");
    }
}
