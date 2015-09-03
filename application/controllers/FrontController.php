<?php
class FrontController{
    protected $_controller, $_action, $_params, $_body;
    static $_instance;
    public static function getInstance(){
        if(!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }
    private function __construct(){
        $request = $_SERVER['REQUEST_URI'];
        $splits = explode('/',trim($request,'/'));
        //Выбор контроллера
        $this->_controller = !empty($splits[0])?ucfirst($splits[0]).'Controller':'IndexController';
        //Выбор экшена
        $this->_action = !empty($splits[1])?$splits[1].'Action':'indexAction';
        //Выбор параметров
        if(!empty($splits[2])){
            $keys = array();
            $values = array();
            for($i=2,$cnt=count($splits); $i<$cnt; $i++){
                if($i%2==0)
                    $keys[] = $splits[$i];
                else
                    $values[] = $splits[$i];
            }
            $this->_params = array_combine($keys,$values);
        }
    }
    public function route(){
        if(class_exists($this->getController())){
            $rc = new ReflectionClass($this->getController());
            if($rc->implementsInterface('IController')){
                if($rc->hasMethod($this->getAction())){
                    $controller = $rc->newInstance();
                    $method = $rc->getMethod($this->getAction());
                    $method->invoke($controller);
                }else{
                    throw new Exception('Wrong Action');
                }
            }else{
                throw new Exception('Wrong Interface');
            }
        }else{
            throw new Exception('Wrong Controller');
        }
    }
    function getParams(){
        return $this->_params;
    }
    function getController(){
        return $this->_controller;
    }
    function getAction(){
        return $this->_action;
    }
    function getBody(){
        return $this->_body;
    }
    function setBody($body){
        $this->_body = $body;
    }
}