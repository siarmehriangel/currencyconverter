<?php namespace Madebysauce\ConvertcurrenciesModule\Convertcurrency;

use Anomaly\Streams\Platform\Database\Seeder\Seeder;
use Illuminate\Support\Facades\DB;
use Madebysauce\ConvertcurrenciesModule\Convertcurrency\Contract\ConvertcurrencyRepositoryInterface;

class ConvertcurrencySeeder extends Seeder
{

    private $convertcurrencyRepository;

    public function __construct(ConvertcurrencyRepositoryInterface $convertcurrencyRepository)
    {
        $this->convertcurrencyRepository = $convertcurrencyRepository;
    }

    /**
     * Run the seeder.
     */
    public function run()
    {

        $this->convertcurrencyRepository->truncate();

    }
}
