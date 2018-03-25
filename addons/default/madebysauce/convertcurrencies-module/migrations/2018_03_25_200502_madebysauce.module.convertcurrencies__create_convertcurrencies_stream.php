<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class MadebysauceModuleConvertcurrenciesCreateConvertcurrenciesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'convertcurrencies',
        'title_column' => 'targetCurrency'
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [

        'pubDate' => [
            'translatable' => true,
            'required' => true,
        ],

        'baseCurrency' => [
            'translatable' => true,
            'required' => true,
        ],

        'baseName' => [
            'translatable' => true,
            'required' => true,
        ],

        'targetCurrency' => [
            'translatable' => true,
            'required' => true,
            'unique' => true,
        ],

        'targetName' => [
            'translatable' => true,
            'required' => true,
        ],

        'exchangeRate' => [
            'translatable' => true,
            'required' => true,
        ],
    ];

}
