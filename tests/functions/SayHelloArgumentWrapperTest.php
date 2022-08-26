<?php

namespace functions;

use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{
    protected Functions $functions;

    protected function setUp(): void
    {
        $this->functions = new Functions();
    }

    /**
     * @dataProvider argumentDataProvider
     */
    public function testArgument($argument)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("An argument is not a number, string, or boolean.");
        $this->functions->sayHelloArgumentWrapper($argument);
    }

    public function argumentDataProvider(): array
    {
        return [
            'floating point number' => [2.8],
            'function' => [func_num_args()],
            'NULL' => [null]
        ];
    }
}
