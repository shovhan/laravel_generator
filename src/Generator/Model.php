<?php

declare(strict_types=1);

namespace Shovhan\Generator\Generator;

use Illuminate\Database\Eloquent\Model as IlluminateModel;
use ReflectionException;
use ReflectionMethod;

final class Model
{
    /** @var string */
    private $modelName;

    /** @var IlluminateModel */
    private $model;

    /**
     * @throws ModelException
     */
    public function __construct(string $modelName)
    {
        if (! class_exists($modelName)) {
            throw ModelException::classNotExists($modelName);
        }

        if (! new $modelName instanceof IlluminateModel) {
            throw ModelException::classIsNotModel($modelName);
        }

        $this->modelName = $modelName;
    }

    /**
     * Detect if model has own method
     *
     * @param string $methodName
     * @return bool
     * @throws ReflectionException
     */
    public function hasOwnMethod(string $methodName): bool
    {
        $reflector = new ReflectionMethod($this->getModel(), $methodName);
        return $reflector->getDeclaringClass()->getName() === get_class($this->getModel());
    }

    /**
     * Get model object
     *
     * @return IlluminateModel
     */
    public function getModel(): IlluminateModel
    {
        if ($this->model === null) {
            $this->model = new $this->modelName;
        }

        return $this->model;
    }
}
