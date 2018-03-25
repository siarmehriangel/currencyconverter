<?php namespace Madebysauce\ConvertcurrenciesModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class ConvertcurrenciesModule extends Module
{

    /**
     * The navigation display flag.
     *
     * @var bool
     */
    protected $navigation = true;

    /**
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'fa fa-puzzle-piece';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'convertcurrencies' => [
            'buttons' => [
                'new_convertcurrency',
            ],
        ],
    ];

}
