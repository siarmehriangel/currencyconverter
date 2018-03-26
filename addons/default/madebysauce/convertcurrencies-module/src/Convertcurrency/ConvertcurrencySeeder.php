<?php namespace Madebysauce\ConvertcurrenciesModule\Convertcurrency;

use Anomaly\Streams\Platform\Database\Seeder\Seeder;
use Illuminate\Support\Facades\DB;
use Madebysauce\ConvertcurrenciesModule\Convertcurrency\Contract\ConvertcurrencyRepositoryInterface;

class ConvertcurrencySeeder extends Seeder
{

    private $convertcurrencyRepository;
    private $currency;

    public function __construct(ConvertcurrencyRepositoryInterface $convertcurrencyRepository)
    {
        $this->convertcurrencyRepository = $convertcurrencyRepository;
    }

    public function setCurrency($currency){
        $this->currency = $currency;
    }

    /**
     * Run the seeder.
     */
    public function run()
    {
        $this->convertcurrencyRepository->truncate();
        dump('Here I Will Be Reading The http://www.floatrates.com/daily/'.$this->currency.'.xml file and will seed my table');
        $url = 'http://www.floatrates.com/daily/'.$this->currency.'.xml';

        $currencyRates = json_decode(json_encode((array) simplexml_load_file($url)), 1);

        foreach ($currencyRates['item'] as $currencyRate){
            $this->convertcurrencyRepository->create(array(
                'pubDate' => $currencyRate['pubDate'],
                'baseCurrency' => $currencyRate['baseCurrency'],
                'baseName' => $currencyRate['baseName'],
                'targetCurrency' => $currencyRate['targetCurrency'],
                'targetName' => $currencyRate['targetName'],
                'exchangeRate' => round($currencyRate['exchangeRate'], 2)
            ));
        }
    }
}
