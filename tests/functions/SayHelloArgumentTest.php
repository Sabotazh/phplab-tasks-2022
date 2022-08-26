<?php

namespace functions;

use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
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
        $this->assertEquals('Hello ' . $expected, $this->functions->sayHelloArgument($input));
    }

    public function positiveDataProvider(): array
    {
        return [
            [28, "28"],
            ["John", "John"],
            [true, "1"]
        ];
    }
}
