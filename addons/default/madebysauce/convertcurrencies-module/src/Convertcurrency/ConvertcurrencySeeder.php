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
        dump('Here I Will Be Reading The http://www.floatrates.com/daily/'.$this->currency.'.xml] file and will seed my table');

        $this->convertcurrencyRepository->truncate();



    }
}
