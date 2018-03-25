<?php namespace Madebysauce\ConvertcurrenciesModule\Convertcurrency\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

class ConvertcurrencyTableBuilder extends TableBuilder
{

    /**
     * The table views.
     *
     * @var array|string
     */
    protected $views = [];

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [
        'targetCurrency'
    ];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'baseCurrency',
        'targetCurrency',
        'exchangeRate'
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit'
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete'
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * The table assets.
     *
     * @var array
     */
    protected $assets = [];

}
