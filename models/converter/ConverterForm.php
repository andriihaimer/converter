<?php

namespace app\models\converter;

use Yii;
use yii\base\Model;
use \app\components\Converter;


class ConverterForm extends Model
{
    public $quantity;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // quantity is required
            [['quantity'], 'required'],
            // rememberMe must be an integer value
            ['quantity', 'number'],
          
        ];
    }
    /**
     * 
     * @return boolean
     */
    public function convert(){
        if($this->validate()){
            $coverter = new Converter;
                return $coverter->convert ($from = 'RUB', $to = 'PLN', $this->quantity);
        }
        return false;
    }
    
}
