<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class MadebysauceModuleConvertcurrenciesCreateConvertcurrenciesFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [

		'pubDate' => 'anomaly.field_type.text',
		'baseCurrency' => 'anomaly.field_type.text',
		'baseName' => 'anomaly.field_type.text',
		'targetCurrency' => 'anomaly.field_type.text',
		'targetName' => 'anomaly.field_type.text',
		'exchangeRate' => 'anomaly.field_type.decimal'
    ];

}
