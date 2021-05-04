<?php

declare(strict_types=1);

namespace Shovhan\Generator\Tests\Generator\Target\Builder;

use Shovhan\Generator\Generator\Model;
use Shovhan\Generator\Generator\Target\Builder\BuilderGenerator;
use Shovhan\Generator\Tests\Mock\Generator\MockModelWithBuilderFactoryMethod;
use Shovhan\Generator\Tests\Mock\Generator\Target\Builder\MockConnectionResolver;
use Shovhan\Generator\Tests\TestCase;

final class BuilderGeneratorTest extends TestCase
{
    /** @var BuilderGenerator */
    private $generator;

    /** @var Model */
    private $modelWithBuilderFactoryMethod;

    protected function setUp(): void
    {
        parent::setUp();

        MockModelWithBuilderFactoryMethod::setConnectionResolver(new MockConnectionResolver());
        $this->generator = new BuilderGenerator();
        $this->modelWithBuilderFactoryMethod = new Model(MockModelWithBuilderFactoryMethod::class);
    }

    /**
     * @group now
     */
    public function testCanDetectCustomClass(): void
    {
        $hasCustomClass = $this->generator->hasCustomClass($this->modelWithBuilderFactoryMethod);
        self::assertTrue($hasCustomClass);
    }

    public function testCanDetectThatCustomClassNotExists(): void
    {
        $eloquentModel = new class extends \Illuminate\Database\Eloquent\Model {};
        $model = new Model(get_class($eloquentModel));
        $hasCustomClass = $this->generator->hasCustomClass($model);
        self::assertFalse($hasCustomClass);
    }
}
