<?php
define('SITE_ROOT', $path);

require(SITE_ROOT . "modules/listar/model/BLL/listar_bll.class.singleton.php");

class listar_model {

    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = listar_bll::getInstance();
    }


    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function list_products() {
        return $this->bll->list_products_BLL();
    }

    public function details_products($id) {
        return $this->bll->details_products_BLL($id);
    }

}
