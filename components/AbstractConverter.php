<?php
namespace app\components;
/**
 * @author Andrzej Haimer
 */
abstract class AbstractConverter {
   /**
    * Array of availible courencies to convert 
    * @var type array
    */
    protected static $currencies = ['RUB','PLN','USD'];
    /**
     * 
     * Function that convert's courency.
     * @return string.  Example 'PLN 3.9948'
     * 
     */
    abstract public function convert ( $from , $to , $quantity );
    /**
     * 
     * Fucntion to set API server that allowed to do conversion
     * 
     */
    abstract public function setApiServer( $url );
    /**
     * 
     * Fucntion to get API server that allowed to do conversion
     * 
     */
    abstract public function getApiServer();
    /**
     * 
     * Fucntion to validate if parammetrs $from and $to in 'convert' function are currencies.
     * @param type string
     * @return type boolean
     * 
     */
    public function validate($value){
       return (in_array($value, self::$currencies)) ?  true :  false;
    }
}
