<?php
/**
 * Created by PhpStorm.
 * User: siar
 * Date: 26/03/18
 * Time: 01:05
 */

namespace Madebysauce\ConvertcurrenciesModule\Http\Controller\User;


use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Support\Facades\Validator;

class ConvertcurrenciesController extends PublicController
{
    private $baseCurrency;
    protected $floatRate;
    private $currencyRates;
    private $selectOptions;
    private $calculations;
    private $baseOption;

    private function setBaseCurrency($currency){
        $this->baseCurrency = $currency;
        $this->calculations = [];
    }

    public function index(){

        $this->configureVariables('gbp');
        if($this->request->getMethod() == 'POST')
        {
            $validator = Validator::make($this->request->all(), [
                'basecurrency'   => 'required',
                'exchangeAmount'    => 'required|numeric',
                'targetcurrency'    => 'required|array|min:1',
            ],['basecurrency.required' => 'Please select \'From Currency\'.', 'exchangeAmount.required' => 'Exchange Amount is required', 'exchangeAmount.numeric' => 'Exchange Amount should be numeric', 'targetcurrency.required' => 'Please select at least one from the \'To Currency\' list', 'targetcurrency.array' => 'Please select at least one from the \'To Currencies\' list']);

            if ($validator->fails())
            {
                return $this->view->make('madebysauce.module.convertcurrencies::convertcurrencies/index', ['selectOptions' => $this->selectOptions, 'errors' => $validator->errors()->getMessages()]);
            }

            if(isset($this->request->basecurrency)){
                $this->configureVariables(strtolower($this->request->basecurrency));
            }
            $this->calculations = $this->calculate($this->request->all());
        }

        return $this->view->make('madebysauce.module.convertcurrencies::convertcurrencies/index', ['selectOptions' => $this->selectOptions, 'calculations' => $this->calculations]);
    }

    public function configureVariables($basecurrency){
        $this->setBaseCurrency($basecurrency);
        $this->floatRate = 'http://www.floatrates.com/daily/'.$this->baseCurrency.'.xml';
        $currencyRatesXML_TO_ARRAY = json_decode(json_encode((array) simplexml_load_file($this->floatRate)), 1);
        $this->currencyRates = $currencyRatesXML_TO_ARRAY['item'];
        $selectOptions = array_column($this->currencyRates, 'targetName', 'targetCurrency');
        $this->baseOption = array($this->currencyRates[0]['baseCurrency'] => $this->currencyRates[0]['baseName']);
        $this->selectOptions = array_merge($this->baseOption,$selectOptions);
    }


    public function calculate($requestArray){
        $calculations = [];
        $targetCurrencies = $requestArray['targetcurrency'];
        $tempPubDate = '';
        foreach ($targetCurrencies as $targetCurrency){
            $currencyRatesCollection = collect($this->currencyRates)->where('targetCurrency','=', $targetCurrency)->first();
            if($currencyRatesCollection and sizeof($currencyRatesCollection)){
                $currencyRatesCollection['exchangeRate'] *= $requestArray['exchangeAmount'];
                $tempPubDate = $currencyRatesCollection['pubDate'];
                $calculations[] = $currencyRatesCollection;
            } elseif($targetCurrency == $requestArray['basecurrency']){
                $calculations[] = [
                    'title' => '1 '.$requestArray['basecurrency'].' = 1 '. $requestArray['basecurrency'],
                    'link' => 'http://www.floatrates.com/'.strtolower($targetCurrency).'/'.strtolower($requestArray['basecurrency']).'/',
                    'description' => '1 '.$requestArray['basecurrency'].' = 1 '. $requestArray['basecurrency'],
                    'pubDate' => !empty($tempPubDate) ? $tempPubDate : date('D, d M Y H:i:s').' GMT',
                    'baseCurrency' => $requestArray['basecurrency'],
                    'baseName' => $requestArray['basecurrency'],
                    'targetCurrency' => $requestArray['basecurrency'],
                    'targetName' => $requestArray['basecurrency'],
                    'exchangeRate' => $requestArray['exchangeAmount'],
                ];
            }

        }
        return $calculations;
    }
}