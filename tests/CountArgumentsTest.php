<?php

use functions\Functions;
use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    protected Functions $functions;

    protected function setUp(): void
    {
        $this->functions = new Functions();
    }

    /**
     * @dataProvider countArgumentDataProvider
     */
    public function testCountArguments($expected, $arguments)
    {
        $this->assertEquals($expected, $this->functions->countArguments(...$arguments));
    }

    public function countArgumentDataProvider(): array
    {
        return [
            [['argument_count' => 0, 'argument_values' => []], []],
            [['argument_count' => 1, 'argument_values' => ['value']], ['value']],
            [['argument_count' => 2, 'argument_values' => ['value1', 'value2']], ['value1','value2']]
        ];
    }
}
