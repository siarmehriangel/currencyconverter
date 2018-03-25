<?php
/**
 * Created by PhpStorm.
 * User: siar
 * Date: 25/03/18
 * Time: 23:14
 */

namespace Madebysauce\ConvertcurrenciesModule;


use Anomaly\Streams\Platform\Database\Seeder\Seeder;
use Madebysauce\ConvertcurrenciesModule\Convertcurrency\Contract\ConvertcurrencyRepositoryInterface;
use Madebysauce\ConvertcurrenciesModule\Convertcurrency\ConvertcurrencySeeder;

class ConvertcurrenciesModuleSeeder extends Seeder
{
    private $currency;
    private $convertcurrencyRepository;
    public function __construct(ConvertcurrencyRepositoryInterface $convertcurrencyRepository, $currency = 'gbp')
    {
        $this->convertcurrencyRepository = $convertcurrencyRepository;
        $this->currency = $currency;
    }

    public function run()
    {
        $convertcurrencySeeder = new ConvertcurrencySeeder($this->convertcurrencyRepository);
        $convertcurrencySeeder->setCurrency($this->currency);
        $convertcurrencySeeder->run();
    }
}