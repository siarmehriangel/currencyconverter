<?php
/**
 * Created by PhpStorm.
 * User: siar
 * Date: 25/03/18
 * Time: 23:14
 */

namespace Madebysauce\ConvertcurrenciesModule;


use Anomaly\Streams\Platform\Database\Seeder\Seeder;
use Madebysauce\ConvertcurrenciesModule\Convertcurrency\ConvertcurrencySeeder;

class ConvertcurrenciesModuleSeeder extends Seeder
{
    public function run()
    {
        $this->call(ConvertcurrencySeeder::class);
    }
}