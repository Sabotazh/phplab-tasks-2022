<?php

namespace arrays;

class Arrays implements ArraysInterface
{

    /**
     * The $input variable contains an array of digits
     * Return an array that will contain the same digits but repeat by its value
     * without changing the order.
     * Example: [1,3,2] => [1,3,3,3,2,2]
     *
     * @param array $input
     * @return array
     */
    public function repeatArrayValues(array $input): array
    {
        $data = [];
        foreach ($input as $value) {
            if (is_numeric($value)) {
                for ($i = 0; $i < $value; $i++) {
                    $data[] = $value;
                }
            }
        }

        return $data;
    }

    /**
     * The $input variable contains an array of digits
     * Return the lowest unique value or 0 if there is no unique values or array is empty.
     * Example: [1, 2, 3, 2, 1, 5, 6] => 3
     *
     * @param array $input
     * @return int
     */
    public function getUniqueValue(array $input): int
    {
        $uniqueNumbers = [];
        foreach (array_count_values($input) as $key => $value) {
            if ($value == 1) {
                $uniqueNumbers[] = $key;
            }
        }

        return empty($uniqueNumbers) ? 0 : min($uniqueNumbers);
    }

    /**
     * The $input variable contains an array of arrays
     * Each sub array has keys: name (contains strings), tags (contains array of strings)
     * Return the list of names grouped by tags
     * !!! The 'names' in returned array must be sorted ascending.
     *
     * Example:
     * [
     *  ['name' => 'potato', 'tags' => ['vegetable', 'yellow']],
     *  ['name' => 'apple', 'tags' => ['fruit', 'green']],
     *  ['name' => 'orange', 'tags' => ['fruit', 'yellow']],
     * ]
     *
     * Should be transformed into:
     * [
     *  'fruit' => ['apple', 'orange'],
     *  'green' => ['apple'],
     *  'vegetable' => ['potato'],
     *  'yellow' => ['orange', 'potato'],
     * ]
     *
     * Make sure the next PHPDoc instructions will be added:
     * @param array $input
     * @return array
     */
    public function groupByTag(array $input): array
    {
        $data = [];
        foreach ($input as $value) {
            foreach ($value['tags'] as $v) {
                $data[$v][] = $value['name'];
                sort($data[$v], SORT_STRING);
            }
            ksort($data, SORT_STRING);
        }

        return $data;
    }
}
