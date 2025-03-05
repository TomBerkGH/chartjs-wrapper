# chartjs-wrapper
This is a lightweight PHP wrapper designed to simplify the use of ChartJs in combination with APIs. It takes raw data and transforms it into a structured JSON format that can be directly used with ChartJs.

This is especially useful in scenarios where data is retrieved dynamically via an API. The wrapper ensures the data is correctly formatted and ready for use, making it easier to generate charts such as line graphs, bar charts, and pie charts without additional processing. This helps to streamline the process of connecting a PHP backend to ChartJs on the frontend.

Example usage in Laravel:
```php
return response()->json(new Data(
    $data->pluck('label')->toArray(), [
        new DataSet($data->pluck('value')->toArray(), [
            'backgroundColor' => $data->pluck('color'),
        ])
    ]
)->addExtraValues('ids', $data->pluck('id')->toArray())->addExtraValues('person_ids', $data->pluck('person_id')->toArray()));
```

```php
return response()->json(
    new Data($data->pluck('label')->toArray(), [
        new DataSet($data->pluck('value')->toArray(), [
            'backgroundColor' => $data->pluck('color'),
        ]),
        new DataSet($data->pluck('target')->toArray(), [
            'label' => 'general.target',
            'backgroundColor' => '#808080',
            'borderColor' => '#808080',
        ]),
    ])->addExtraValues('ids', $data->pluck('id')->toArray())
);
```

output can be directly used in ChartJS
```json
{
    "labels": [
        "2024-W52",
        "2025-W01",
        "2025-W02",
        "2025-W03",
        "2025-W04",
        "2025-W05",
        "2025-W06",
        "2025-W07",
        "2025-W08",
        "2025-W09",
        "2025-W10"
    ],
    "datasets": [
        {
            "label": "Label 1",
            "data": [
                0,
                13.2,
                13.2,
                26.4,
                13.2,
                19.8,
                6.6,
                19.8,
                33,
                6.6,
                0
            ],
            "pointRadius": 5,
            "pointHoverRadius": 20,
            "borderRadius": 5,
            "fill": true,
            "tension": 0,
            "borderColor": "#f26656",
            "backgroundColor": "rgba(242, 102, 86, 0.5)"
        },
        {
            "label": "Label 2",
            "data": [
                0,
                3.75,
                13.2,
                19.8,
                5.6,
                26.4,
                13.2,
                41.78333333333333,
                0,
                6.6,
                0
            ],
            "pointRadius": 5,
            "pointHoverRadius": 20,
            "borderRadius": 5,
            "fill": true,
            "tension": 0,
            "borderColor": "#50220a",
            "backgroundColor": "rgba(80, 34, 10, 0.5)"
        }
    ]
}
```