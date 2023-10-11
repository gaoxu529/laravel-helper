<?php

namespace risingsun\Helper\Tests;

use Illuminate\Http\Request;
use Orchestra\Testbench\TestCase;

class HelperFunctionTest extends TestCase
{
    /** @test */
    public function it_formatStringWithAssociativeArray()
    {
        $result = formatStringWithAssociativeArray('Hello, {name}!', ['name' => 'RisingSun']);
        $this->assertEquals('Hello, RisingSun!', $result);
    }

    /** @test */
    public function it_getFirstPublicIp()
    {
        $request = new Request();
        $request->headers->set('X-Forwarded-For', '127.0.0.1,192.168.123.116,64.64.241.127,10.0.0.2');
        $result = getFirstPublicIp($request);
        $this->assertEquals('64.64.241.127', $result);
    }
}