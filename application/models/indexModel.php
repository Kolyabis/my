<?php
class IndexModel extends Library{

    public function views($header, $body, $footer ,$params = null){
        /*$menu = new mod_menu();
        $mainMenu = $menu->get_menu($this->db());
        $params['mainMenu'] = $mainMenu;*/
        $this->checkArray($params);
        include(__DIR__.'/'.$header);
        include(__DIR__.'/'.$body);
        include(__DIR__.'/'.$footer);
    }
}