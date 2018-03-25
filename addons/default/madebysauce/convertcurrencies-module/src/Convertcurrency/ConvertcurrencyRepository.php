<?php namespace Madebysauce\ConvertcurrenciesModule\Convertcurrency;

use Madebysauce\ConvertcurrenciesModule\Convertcurrency\Contract\ConvertcurrencyRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class ConvertcurrencyRepository extends EntryRepository implements ConvertcurrencyRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var ConvertcurrencyModel
     */
    protected $model;

    /**
     * Create a new ConvertcurrencyRepository instance.
     *
     * @param ConvertcurrencyModel $model
     */
    public function __construct(ConvertcurrencyModel $model)
    {
        $this->model = $model;
    }
}
