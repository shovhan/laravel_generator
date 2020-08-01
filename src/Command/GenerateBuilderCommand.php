<?php

declare(strict_types=1);

namespace Shovhan\Generator\Command;

use Illuminate\Console\Command;
use Shovhan\Generator\Generator\Common\Model;
use Shovhan\Generator\Generator\Target\Builder\BuilderGenerator;

final class GenerateBuilderCommand extends Command
{
    /** @var string */
    protected $signature = 'ecosystem-generator:builder {model : Class name of the Model}';

    /** @var string */
    protected $description = 'Generate Builder class for Model';

    /** @var BuilderGenerator */
    private $generatorFacade;

    public function __construct(BuilderGenerator $generatorFacade)
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
