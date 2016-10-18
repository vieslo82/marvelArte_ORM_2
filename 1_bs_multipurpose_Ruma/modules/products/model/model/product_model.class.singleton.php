<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/php/marvelArte_ORM/1_bs_multipurpose_Ruma/';
define('SITE_ROOT', $path);
require(SITE_ROOT . "modules/products/model/BLL/product_bll.class.singleton.php");

class product_model {

    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = product_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_product($arrArgument) {
        return $this->bll->create_product_BLL($arrArgument);
    }

}
