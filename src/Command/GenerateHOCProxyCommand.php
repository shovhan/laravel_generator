<?php

declare(strict_types=1);

namespace Shovhan\Generator\Command;

use Illuminate\Console\Command;
use Shovhan\Generator\Generator\Model;
use Shovhan\Generator\Generator\Target\HOCProxy\HOCProxyGenerator;

final class GenerateHOCProxyCommand extends Command
{
    /** @var string */
    protected $signature = 'make:hocproxy {model : Class name of the Model}';

    /** @var string */
    protected $description = 'Generate HigherOrderCollectionProxy class for Model';

    /** @var HOCProxyGenerator */
    private $generator;

    public function __construct(HOCProxyGenerator $generator)
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
