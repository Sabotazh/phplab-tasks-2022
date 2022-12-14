<?php

namespace functions;

use PHPUnit\Framework\TestCase;

class SayHelloTest extends TestCase
{
    protected Functions $functions;

    protected function setUp(): void
    {
        $this->functions = new Functions();
    }

    public function testGreeting()
    {
        $this->assertEquals('Hello', $this->functions->sayHello());
    }
}
