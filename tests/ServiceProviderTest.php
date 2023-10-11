<?php

namespace risingsun\Helper\Tests;

use Orchestra\Testbench\TestCase;
use risingsun\Helper\HelperServiceProvider;

class ServiceProviderTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            HelperServiceProvider::class
        ];
    }

    /** @test */
    public function it_registers_services()
    {
        $this->assertTrue(true);
    }
}