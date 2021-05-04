<?php

declare(strict_types=1);

namespace Shovhan\Generator\Tests\Mock\Generator\Target\Builder;

use Illuminate\Database\ConnectionResolverInterface;

final class MockConnectionResolver implements ConnectionResolverInterface
{
    public function connection($name = null): MockConnection
    {
        return $this->getMockConnection();
    }

    public function getDefaultConnection(): string
    {
        return 'default';
    }

    public function setDefaultConnection($name): void
    {
    }

    private function getMockConnection(): MockConnection
    {
        return new MockConnection();
    }
}
