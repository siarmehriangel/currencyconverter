<?php namespace Madebysauce\ConvertcurrenciesModule\Http\Controller\Admin;

use Madebysauce\ConvertcurrenciesModule\Convertcurrency\Form\ConvertcurrencyFormBuilder;
use Madebysauce\ConvertcurrenciesModule\Convertcurrency\Table\ConvertcurrencyTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class ConvertcurrenciesController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param ConvertcurrencyTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ConvertcurrencyTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param ConvertcurrencyFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(ConvertcurrencyFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param ConvertcurrencyFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(ConvertcurrencyFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
