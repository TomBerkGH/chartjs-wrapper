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