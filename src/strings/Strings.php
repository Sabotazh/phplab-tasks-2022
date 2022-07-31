<?php

namespace strings;

use strings\StringsInterface;

class Strings implements StringsInterface
{

    /**
     * The $input variable contains text in snake case (i.e. hello_world or this_is_home_task)
     * Transform it into a camel-cased string and return (i.e. helloWorld or thisIsHomeTask)
     *
     * @param string $input
     * @return string
     */
    public function snakeCaseToCamelCase(string $input): string
    {
        return lcfirst(str_replace('_', '', ucwords($input, '_')));
    }

    /**
     * The $input variable contains multibyte text like 'ФЫВА олдж'
     * Mirror each word individually and return transformed text (i.e. 'АВЫФ ждло')
     *
     * @param string $input
     * @return string
     */
    public function mirrorMultibyteString(string $input): string
    {
        return implode(' ', array_reverse(explode(' ', implode(array_reverse(mb_str_split($input))))));
    }

    /**
     * My friend wants a new band name for her band.
     * She likes bands that use the formula: 'The' + a noun with capitalized first letter.
     * However, when a noun STARTS and ENDS with the same letter,
     * she likes to repeat the noun twice and connect them together with the first and last letter,
     * combined into one word like so (WITHOUT a 'The' in front):
     * dolphin -> The Dolphin
     * alaska -> Alaskalaska
     * europe -> Europeurope
     * Implement this logic.
     *
     * @param string $noun
     * @return string
     */
    public function getBrandName(string $noun): string
    {
        return $noun[0] == substr($noun, -1) ? ucwords($noun).substr($noun, 1) : 'The '.ucfirst($noun);
    }
}
