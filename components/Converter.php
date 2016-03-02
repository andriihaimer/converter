<?php

namespace app\components;

use linslin\yii2\curl\Curl;

/**
 * Base class to converter application
 *
 * @author Andrzej Haimer
 */
class Converter extends AbstractConverter {
    /**
     * Store url to API server
     * @var type string
     */
    private static $apiServer;
    /**
     * Instance of CURL class
     * @var type model
     * 
     */
    public $CURL ; 
    
    /**
     * Initialization of local variables
     */
  
    public function __construct() {
        $this->setApiserver('http://devel.farebookings.com/api/curconversor');
        $this->CURL = new Curl;
    }
    /**
     * Function that makes convertion of currency
     * @param string $from 
     * @param string $to
     * @param integer $quantity
     * @return string
     * @throws \Exception when  input params does not pass validation
     */
    public function convert($from , $to , $quantity = 1) {
        /**
         * Check if input variables are correct
         */
        if (!parent::validate($from) || !parent::validate($to)) {
            throw new \Exception('Wrong currency parrametr.');
        }
        
        if($quantity > 0) {
            /**
             * Try to make request to server. If success then return coverted value, else return error
             */
            try{
                $result = $this->CURL->get($this->getApiServer() . '/'. $from . '/' . $to . '/' . round($quantity,4) . '/');
            }catch(\Exception $e){
                throw new Exception ($e->getMessage());
            }
        }else{
            /**
             * Return string, eg. "PLN 0", when $quantity <= 0
             */
            $result = $to . ' 0';
        }
        return $result;
    }

    /**
     * Returns url to api server 
     * @return string 
     */
    public function getApiServer() {
        return self::$apiServer;
    }
    
    /**
     * Function sets local static variabble $apiServer
     * @return string
     */
    public function setApiServer($url) {
        if (empty($url)) {
            throw new Exception("Server Api Url can not be empty.");
        }
        self::$apiServer = $url;
    }

}
