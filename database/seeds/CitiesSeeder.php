<?php

use App\Services\CitiesService;
use Illuminate\Database\Seeder;

/**
 * Class CitiesSeeder
 */
final class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = config('defaults.cities');
        CitiesService::getInstance()
            ->importCities($cities);
    }
}
