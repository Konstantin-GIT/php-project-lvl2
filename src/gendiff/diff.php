<?php
namespace Gendiff\Diff;

function diff(array $data1, array $data2)
{
    $keys = array_unique(array_merge(array_keys($data1), array_keys($data2)));
    $str = '';
    print_r($keys);
    foreach ($keys as $key) {
        if (!array_key_exists($key, $data1)) {
            $result[$key] = $data2["$key"];
            $str .= ' + ' . $key . ': ' . $data2["$key"] . "\n";
        } elseif (!array_key_exists($key, $data2)) {
            $result[$key] = $data1["$key"];
            $str .= ' - ' . $key . ': ' . $data1["$key"] . "\n";
        } elseif ($data1[$key] !== $data2[$key]) {
            $result[' - ' . $key] = $data1["$key"];
            $result[' + ' . $key] = $data2["$key"];
            $str .= ' - ' . $key . ': ' . $data1["$key"] . "\n";
            $str .= ' + ' . $key . ': ' . $data2["$key"] . "\n";
        } elseif ($data1[$key] === $data2[$key]) {
            $result[' + ' . $key] = $data1["$key"];
            $str .= '   ' . $key . ': ' . $data1["$key"] . "\n";
        }
    }

    return $str;
}






namespace BrainGames\Calc;
use function brainGames\engine\engine;
