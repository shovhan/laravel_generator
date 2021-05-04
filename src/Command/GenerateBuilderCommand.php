<?php

declare(strict_types=1);

namespace Shovhan\Generator\Command;

use Illuminate\Console\Command;
use Shovhan\Generator\Generator\Model;
use Shovhan\Generator\Generator\Target\Builder\BuilderGenerator;

final class GenerateBuilderCommand extends Command
{
    /** @var string */
    protected $signature = 'make:builder {model : Class name of the Model}';

    /** @var string */
    protected $description = 'Generate Builder class for Model';

    /** @var BuilderGenerator */
    private $generator;

    public function __construct(BuilderGenerator $generator)
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
