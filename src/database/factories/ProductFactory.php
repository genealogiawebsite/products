<?php

use Faker\Generator as Faker;
use LaravelEnso\Categories\App\Models\Category;
use LaravelEnso\Companies\App\Models\Company;
use LaravelEnso\Helpers\App\Enums\VatRates;
use LaravelEnso\MeasurementUnits\App\Models\MeasurementUnit;
use LaravelEnso\Products\App\Models\Product;

$factory->define(Product::class, fn (Faker $faker) => [
    'category_id' => fn () => factory(Category::class)->create()->id,
    'manufacturer_id' => fn () => factory(Company::class)->create()->id,
    'measurement_unit_id' => fn () => (factory(MeasurementUnit::class)->create())->id,
    'name' => $faker->word,
    'part_number' => 'P'.(Product::max('id') + 1),
    'internal_code' => 'CT-'.$faker->numberBetween(0, 500),
    'list_price' => $faker->numberBetween(1, 300),
    'vat_percent' => VatRates::keys()->random(),
    'package_quantity' => $faker->numberBetween(0, 5),
    'description' => $faker->text(50),
    'link' => $faker->url,
    'is_active' => true,
]);
