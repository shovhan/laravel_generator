<?php

declare(strict_types=1);

namespace Shovhan\Generator\Command;

use Illuminate\Console\Command;
use Shovhan\Generator\Generator\Common\Model;
use Shovhan\Generator\Generator\Target\Builder\BuilderGenerator;
use Shovhan\Generator\Generator\Target\Collection\CollectionGenerator;
use Shovhan\Generator\Generator\Target\HOCProxy\HOCProxyGenerator;

final class GenerateEcosystemCommand extends Command
{
    /** @var string */
    protected $signature = 'ecosystem-generator:all {model : Class name of the Model}';

    /** @var string */
    protected $description = 'Generate ecosystem classes for Model';

    /** @var HOCProxyGenerator */
    private $proxyGenerator;

    /** @var CollectionGenerator */
    private $collectionGenerator;

    /** @var BuilderGenerator */
    private $builderGenerator;

    public function __construct(
        HOCProxyGenerator $proxyGenerator,
        CollectionGenerator $collectionGenerator,
        BuilderGenerator $builderGenerator
    ) {
        parent::__construct();

        $this->proxyGenerator = $proxyGenerator;
        $this->collectionGenerator = $collectionGenerator;
        $this->builderGenerator = $builderGenerator;
    }

    public function handle(): void
    {
        $model = new Model($this->argument('model'));
        $this->proxyGenerator->generateForModel($model);
        $this->collectionGenerator->generateForModel($model);
        $this->builderGenerator->generateForModel($model);
    }
}
