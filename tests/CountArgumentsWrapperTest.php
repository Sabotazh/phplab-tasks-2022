<?php

use functions\Functions;
use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
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
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Some argument is not a string.");
        $this->functions->countArgumentsWrapper($argument);
    }

    public function argumentDataProvider(): array
    {
        return [
            'floating point number' => [2.8],
            'function' => [func_num_args()],
            'integer' => [28],
            'NULL' => [null]
        ];
    }
}
