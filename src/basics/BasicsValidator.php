<?php

namespace basics;

use InvalidArgumentException;

class BasicsValidator implements BasicsValidatorInterface
{

    /**
     * Implemented the check functionality described in the method getMinuteQuarter (BasicsInterface Class) which throws an Exception.
     *
     * @param int $minute
     * @throws InvalidArgumentException
     */
    public function isMinutesException(int $minute): void
    {
        if(!($minute > 0 && $minute < 59))
            throw new InvalidArgumentException('getMinuteQuarter function only accepts integers between 0 to 59. Input was: '.$minute.'.');
    }

    /**
     * Implemented the check functionality described in the method getMinuteQuarter (BasicsInterface Class) which throws Exception.
     *
     * @param int $year
     * @throws InvalidArgumentException
     */
    public function isYearException(int $year): void
    {
        if($year < 1900)
            throw new InvalidArgumentException($year.' is less than 1900.');
    }

    /**
     * Implemented the check functionality described in the method getMinuteQuarter (BasicsInterface Class) which throws Exception.
     *
     * @param string $input
     * @throws InvalidArgumentException
     */
    public function isValidStringException(string $input): void
    {
        if(!strlen($input) == 6)
            throw new InvalidArgumentException($input.' is less or bigger than 6.');
    }
}