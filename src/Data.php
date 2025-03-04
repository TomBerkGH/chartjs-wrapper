<?php

declare(strict_types=1);

namespace TomVanDenBerk\ChartJsWrapper;

use JsonSerializable;

class Data implements JsonSerializable
{

    private array $extraDataSets = [];
    private array $extraValues = [];

    /**
     * @param array $labels
     * @param array<DataSet> $datasets
     */
    public function __construct(private readonly array $labels, private array $datasets)
    {
    }

    public function addExtraValues(string $index, array $values): Data
    {
        $this->extraValues[$index] = $values;
        return $this;
    }

    /**
     * @param DataSet $dataset
     * @return $this
     */
    public function addDataset(DataSet $dataset): Data
    {
        $this->datasets[] = $dataset;
        return $this;
    }

    /**
     * @param string $index
     * @param DataSet $dataset
     * @return Data
     */
    public function addExtraDataSet(string $index, DataSet $dataset): Data
    {
        $this->extraDataSets[$index][] = $dataset;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_merge(
            [
                'labels' => $this->labels,
                'datasets' => array_map(fn(DataSet $dataset) => $dataset->toArray(), $this->datasets),
            ],
            $this->extraValues,
            array_map(fn(array $datasets) => array_map(fn(DataSet $dataset) => $dataset->toArray(), $datasets), $this->extraDataSets)
        );
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
