<?php
class IndexController implements IController{
    private $fc;
    public $model;
    public function __construct(){
        $this->fc = FrontController::getInstance();
        $this->model = new IndexModel();
    }
    public function indexAction(){
        $params = $this->fc->getParams();
        $result = $this->model->views('../views/header.php', '../views/default/default.php', '../views/footer.php', $params);
        $this->fc->setBody($result);
    }
    public function updateAction(){}
    public function insertAction(){}
    public function deleteAction(){}
}