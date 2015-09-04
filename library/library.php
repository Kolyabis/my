<?php
class Lirary{
    /* Метод подключения БД */
    public function db(){
        $db = Db::getInstance();
        return $db;
    }
    /* Метод проверки на массив */
    public function checkArray($arr){
        if(is_array($arr) && !empty($arr)){
            return $arr;
        }
    }

}