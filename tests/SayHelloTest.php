<?php

use functions\Functions;
use PHPUnit\Framework\TestCase;

class SayHelloTest extends TestCase
{
    protected Functions $functions;

    protected function setUp(): void
    {
        $this->functions = new Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, $this->functions->sayHello());
    }

    /**
     * @return array
     */
    public function positiveDataProvider(): array
    {
        return [
            ['', 'Hello']
        ];
    }
}
