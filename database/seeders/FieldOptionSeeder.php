<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\FieldOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $commonFieldOptions = [
            [
                'name' => 'Country',
                'options' => [
                    'Malaysia',
                    'Singapore',
                    'Indonesia',
                    'Thailand',
                    'Vietnam',
                    'Philippines',
                    'Myanmar',
                    'Cambodia',
                    'Laos',
                    'Brunei',
                ]
            ],
            [
                'name' => 'Currency',
                'options' => [
                    'MYR',
                    'SGD',
                    'IDR',
                    'THB',
                    'VND',
                    'PHP',
                    'MMK',
                    'KHR',
                    'LAK',
                    'BND',
                ]
            ],
        ];

        foreach ($commonFieldOptions as $commonFieldOption) {
            $field = Field::query()->create([
                'name' => $commonFieldOption['name'],
                'slug' => \Illuminate\Support\Str::slug($commonFieldOption['name']),
                'type_slug' => 'select',
            ]);

            foreach ($commonFieldOption['options'] as $option) {
                FieldOption::query()->create([
                    'field_id' => $field->id,
                    'name' => $option,
                    'slug' => \Illuminate\Support\Str::slug($option),
                ]);
            }
        }
    }
}
