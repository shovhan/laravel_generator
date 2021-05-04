<?php

namespace Shovhan\Generator\Generator;

use Shovhan\Generator\Generator\Model;

interface Generator
{
    /**
     * Generate class for model
     *
     * @param Model $model
     *
     * @return string - name of generated class
     */
    public function generateForModel(Model $model): string;

    /**
     * Determine if class for model already exists
     *
     * @param Model $model
     *
     * @return bool
     */
    public function hasCustomClass(Model $model): bool;

    /**
     * Get custom class name
     *
     * @param Model $model
     *
     * @return string
     */
    public function getCustomClass(Model $model): string;
}
