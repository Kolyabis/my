<?php
class IndexModel{
    public function views($header, $body, $footer ,$params = null){
        $db = Db_ext::getInstance();
        $lib = new lib();
        $menu = new mod_menu();
        $mainMenu = $menu->get_menu($db);
        $params['mainMenu'] = $mainMenu;
        $lib->checkArray($params);
        include(__DIR__.'/'.$header);
        include(__DIR__.'/'.$body);
        include(__DIR__.'/'.$footer);
    }
}