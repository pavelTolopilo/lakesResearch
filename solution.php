<?php

/**
 * Handle relief values and get depth if it exists
 *
 * @param iterable $a
 * @return int|null
 */
function solution(iterable $a): int
{
    $top = null;
    $bottom = null;
    $depth = null;

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

            if ($bottom < $altitude) {
                $tmpDepth = $altitude - $bottom;

                if (!$depth || $depth < $tmpDepth) {
                    $depth = $tmpDepth;
                }
            }
        }
    }

    return $depth ?? 0;
}

$n = [3, 1, 2, 2, 4, 3];

print_r(solution($n) . PHP_EOL);