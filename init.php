<?php
session_start();
ini_set('display_errors', 1);
set_include_path(get_include_path()
    .PATH_SEPARATOR.'application/controllers'
    .PATH_SEPARATOR.'application/models'
    .PATH_SEPARATOR.'application/views'
    .PATH_SEPARATOR.'library'
    .PATH_SEPARATOR.'lang'
    .PATH_SEPARATOR.'modules');
function init($class){
    require $class.'.php';
}
spl_autoload_register('init');
function modules($class){
    require 'modules/'.$class.'.php';
}
spl_autoload_register('modules');
function library($class){
    require 'library/'.$class.'.php';
}
spl_autoload_register('library');
function lang($class){
    require 'lang/'.$class.'.php';
}
spl_autoload_register('lang');
class Db {
    protected static $dsn = 'mysql:dbname=2z;host=localhost';
    protected static $user = 'root';
    protected static $password = '';
    protected static $_instance;
    public static function getInstance(){
        if(self::$_instance instanceof PDO){
            return self::$_instance;
        }else{
            try{
                return self::$_instance = new PDO(self::$dsn,self::$user,self::$password);
            }catch(Exception $error){
                echo $error->getCode().'<br>';
                echo $error->getMessage().'<br>';
                echo $error->getLine().'<br>';
            }
        }
    }
    protected function __construct(){}
    protected function __clone(){}
}