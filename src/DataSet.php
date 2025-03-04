<?php

declare(strict_types=1);

namespace TomVanDenBerk\ChartJsWrapper;

use JsonSerializable;
use ReturnTypeWillChange;

class DataSet implements JsonSerializable
{

    const int POINT_RADIUS = 5;
    const int POINT_HOVER_RADIUS = 20;
    const int BORDER_RADIUS = 5;
    const bool FILL = true;
    const float TENSION = 0;

    const float ALPHA = 0.5;

    private array $defaults = [
        'label' => '',
        'data' => [],
        'pointRadius' => self::POINT_RADIUS,
        'pointHoverRadius' => self::POINT_HOVER_RADIUS,
        'borderRadius' => self::BORDER_RADIUS,
        'fill' => self::FILL,
        'tension' => self::TENSION,
    ];

    private array $extra;

    /**
     * @param array $data
     * @param array $extra
     */
    public function __construct(array $data, array $extra = [])
    {
        $this->defaults['data'] = $data;
        $this->extra = $extra;
    }

    /**
     * @param float $alpha
     * @return $this
     */
    public function withColorsBasedOnLabel(float $alpha = self::ALPHA): DataSet
    {
        $color = Helper::stringToHexColor($this->extra['label'] ?? "");

        $this->extra['borderColor'] = $color;
        $this->extra['backgroundColor'] = Helper::convertHexToRgba($color, $alpha);
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_merge($this->defaults, $this->extra);
    }

    #[ReturnTypeWillChange]
    function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @param float $tension
     * @return $this
     */
    public function tension(float $tension): DataSet
    {
        $this->defaults['tension'] = $tension;
        return $this;
    }

    /**
     * @param int $radius
     * @return $this
     */
    public function pointRadius(int $radius): DataSet
    {
        $this->defaults['pointRadius'] = $radius;
        return $this;
    }

    /**
     * @param int $radius
     * @return $this
     */
    public function pointHoverRadius(int $radius): DataSet
    {
        $this->defaults['pointHoverRadius'] = $radius;
        return $this;
    }

    /**
     * @param int $radius
     * @return $this
     */
    public function borderRadius(int $radius): DataSet
    {
        $this->defaults['borderRadius'] = $radius;
        return $this;
    }

    /**
     * @param bool $fill
     * @return $this
     */
    public function fill(bool $fill): DataSet
    {
        $this->defaults['fill'] = $fill;
        return $this;
    }
}
