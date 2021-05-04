<?php

declare(strict_types=1);

namespace Shovhan\Generator\Command;

use Illuminate\Console\Command;
use Shovhan\Generator\Generator\Model;
use Shovhan\Generator\Generator\Target\Collection\CollectionGenerator;

final class GenerateCollectionCommand extends Command
{
    /** @var string */
    protected $signature = 'make:collection {model : Class name of the Model}';

    /** @var string */
    protected $description = 'Generate Collection class for Model';

    /** @var CollectionGenerator */
    private $generator;

    public function __construct(CollectionGenerator $generator)
    {
        parent::__construct();
        $this->generator = $generator;
    }

    public function handle(): void
    {
        $model = new Model($this->argument('model'));
        $this->generator->generateForModel($model);
    }
}
