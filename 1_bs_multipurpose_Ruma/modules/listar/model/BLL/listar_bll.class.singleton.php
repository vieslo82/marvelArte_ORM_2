<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/php/marvelArte_ORM_2/1_bs_multipurpose_Ruma/';
define('SITE_ROOT', $path);
define('MODEL_PATH', SITE_ROOT . 'model/');

require (MODEL_PATH . "Db.class.singleton.php");
require(SITE_ROOT . "modules/listar/model/DAO/listar_dao.class.singleton.php");


class listar_bll {

    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = listar_dao::getInstance();
        $this->db = Db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function list_products_BLL() {
        return $this->dao->list_products_DAO($this->db);
    }

    public function details_products_BLL($id) {
        return $this->dao->details_products_DAO($this->db,$id);
    }

}
