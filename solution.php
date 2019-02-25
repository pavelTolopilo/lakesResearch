<?php

/**
 * Handle relief values and get depth if it exists
 *
 * @param iterable $a
 * @return int|null
 */
function solution(iterable $a): ?int
{
    $top = 0;
    $bottom = 0;
    $depth = 0;

    foreach ($a as $altitude) {
        if ($top <= $altitude) {
            if ($bottom) {
                $tmpDepth = $top - $bottom;

                if (!$depth || $depth < $tmpDepth) {
                    $depth = $tmpDepth;
                    $bottom = null;
                }
            }

            $top = $altitude;
        } else {
            if (!$bottom || $bottom > $altitude) {
                $bottom = $altitude;
            }
        }
    }

    return $depth;
}

$n = [3, 50, 2, 4, 9, 11, 2, 50, 1, 9];

print_r(solution($n) . PHP_EOL);