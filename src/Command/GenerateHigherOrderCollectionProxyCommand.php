<?php

declare(strict_types=1);

namespace Shovhan\Generator\Command;

use Illuminate\Console\Command;
use Shovhan\Generator\Generator\Common\Model;
use Shovhan\Generator\Generator\Target\HOCProxy\HOCProxyGenerator;

final class GenerateHigherOrderCollectionProxyCommand extends Command
{
    /** @var string */
    protected $signature = 'ecosystem-generator:hocproxy {model : Class name of the Model}';

    /** @var string */
    protected $description = 'Generate HigherOrderCollectionProxy class for Model';

    /** @var HOCProxyGenerator */
    private $generatorFacade;

    public function __construct(HOCProxyGenerator $generatorFacade)
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
