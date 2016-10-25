<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/php/marvelArte_ORM_2/1_bs_multipurpose_Ruma/';

require (MODEL_PATH . "Db.class.singleton.php");
require(SITE_ROOT . "modules/products/model/DAO/product_dao.class.singleton.php");

class product_bll {

    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = productDAO::getInstance();
        $this->db = Db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_product_BLL($arrArgument) {
        return $this->dao->create_product_DAO($this->db, $arrArgument);
    }

    public function obtain_paises_BLL($url) {
        return $this->dao->obtain_paises_DAO($url);
    }

    public function obtain_provincias_BLL() {
            return $this->dao->obtain_provincias_DAO();
        }

    public function obtain_poblaciones_BLL($arrArgument) {
            return $this->dao->obtain_poblaciones_DAO($arrArgument);
        }


}
