<?php

declare(strict_types=1);

namespace Shovhan\Generator\Command;

use Illuminate\Console\Command;
use Shovhan\Generator\Generator\Common\Model;
use Shovhan\Generator\Generator\Target\Collection\CollectionGenerator;

final class GenerateCollectionCommand extends Command
{
    /** @var string */
    protected $signature = 'ecosystem-generator:collection {model : Class name of the Model}';

    /** @var string */
    protected $description = 'Generate Collection class for Model';

    /** @var CollectionGenerator */
    private $generatorFacade;

    public function __construct(CollectionGenerator $generatorFacade)
    {
        parent::__construct();
        $this->generatorFacade = $generatorFacade;
    }

    public function handle(): void
    {
        $model = new Model($this->argument('model'));
        $this->generatorFacade->generateForModel($model);
    }
}
