<?php namespace Madebysauce\ConvertcurrenciesModule\Convertcurrency;

use Madebysauce\ConvertcurrenciesModule\Convertcurrency\Contract\ConvertcurrencyInterface;
use Anomaly\Streams\Platform\Model\Convertcurrencies\ConvertcurrenciesConvertcurrenciesEntryModel;

class ConvertcurrencyModel extends ConvertcurrenciesConvertcurrenciesEntryModel implements ConvertcurrencyInterface
{
    //for mass assignment
    protected $guarded = ['id'];
}
