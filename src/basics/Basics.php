<?php

namespace basics;

use InvalidArgumentException;

class Basics implements BasicsInterface
{
    private BasicsValidator $validator;

    public function __construct(BasicsValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Determines in which quarter of an hour the number falls.
     * Return one of the values: "first", "second", "third" and "fourth".
     * Throw InvalidArgumentException if $minute is negative of greater than 60.
     *
     * @param int $minute
     * @return string
     * @throws InvalidArgumentException
     */
    public function getMinuteQuarter(int $minute): string
    {
        $this->validator->isMinutesException($minute);

        $print = "It's like you're living in an extraterrestrial time";

        if ($minute > 0 && $minute <= 15) {
            $print = "first";
        } else if ($minute > 15 && $minute <= 30) {
            $print = "second";
        } else if ($minute > 30 && $minute <= 45) {
            $print = "third";
        } else if ($minute > 45 && $minute < 60 || $minute <= 0) {
            $print = "fourth";
        }

        return $print;
    }

    /**
     * Return true if the year is Leap or false otherwise.
     * Throw InvalidArgumentException if $year is lower than 1900.
     *
     * @param int $year
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function isLeapYear(int $year): bool
    {
        $this->validator->isYearException($year);

        return boolval(date('L', mktime(0, 0, 0, 1, 1, $year)));
    }

    /**
     * The $input variable contains a string of six digits (like '123456' or '385934').
     * Return true if the sum of the first three digits is equal with the sum of last three ones
     * (i.e. in first case 1+2+3 not equal with 4+5+6 - need to return false).
     * Throw InvalidArgumentException if $input contains more than 6 digits.
     *
     * @param string $input
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function isSumEqual(string $input): bool
    {
        $this->validator->isValidStringException($input);

        $input = str_split($input); /* optional */

        return !boolval($input[0] + $input[1] + $input[2] - $input[3] - $input[4] - $input[5]);
    }
}
