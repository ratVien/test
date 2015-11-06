<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 21.10.2015
 * Time: 8:14
 */

class CategoryIdRepo{
    const TABLE_NAME = 'category_id';
    protected $_conn;
    public function __construct(){
        $this->_conn = DB::getConnection();
    }
    public function getAllCurrency(){
        $table=self::TABLE_NAME;
        $currencies=array();
        $q=$this->_conn->query("SELECT * FROM {$table}",PDO::FETCH_ASSOC);
 //       $query->setFetchMode(PDO::FETCH_ASSOC);
        while($result = $q->fetch()){
            $currencies[$result['id']] = new Currency($result['name']);
        }
        return $currencies;
    }
    public function addCurrency($newCurrency){
        $currencies=$this->getAllCurrency();
        if(preg_match("/^[a-zA-Z]{3,3}$/", $newCurrency)){
            $currency = strtoupper($newCurrency);
            foreach($currencies as $existCurrency){
             if($currency==$existCurrency->currency){
                 $_SESSION['error'] = 'Такая валюта уже есть!';
                 return false;
             }
            }
            $json= file_get_contents("http://api.fixer.io/latest?base=USD");
            $apiCurrencies=json_decode($json,1);
            $apiCurrencies = array_keys($apiCurrencies['rates']);
            if(in_array($currency,$apiCurrencies)){
                $table=self::TABLE_NAME;
 //           try {
                $q=$this->_conn->prepare("INSERT INTO {$table} (name) VALUES ('{$currency}')");
                $q->execute();
                echo $currency;
                return true;
 //           }catch (Exception $e){
 //               echo 'Excepción capturada: ',$e->getMessage();
//                return false;
 //           }

            }
            else{
                $_SESSION['error'] = 'Такой валюты нет в API!';
                return false;
            }

        }
        else {
            $_SESSION['error'] = 'Неверный ввод!';
            return false;
        }
    }
}