<?php

declare(strict_types=1);

namespace TomVanDenBerk\ChartJsWrapper;

class Helper
{
    /**
     * @param string $hexColor
     * @param float $alpha
     * @return string
     */
    public static function convertHexToRgba(string $hexColor, float $alpha): string
    {
        $hexColor = ltrim($hexColor, '#');

        $r = hexdec(substr($hexColor, 0, 2));
        $g = hexdec(substr($hexColor, 2, 2));
        $b = hexdec(substr($hexColor, 4, 2));

        return "rgba($r, $g, $b, $alpha)";
    }

    /**
     * @param string $input
     * @return string
     */
    public static function stringToHexColor(string $input): string
    {
        return '#' . substr(md5($input), 0, 6);
    }
}