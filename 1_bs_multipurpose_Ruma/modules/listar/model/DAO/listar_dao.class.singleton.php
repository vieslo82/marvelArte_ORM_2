<?php
class listar_dao {

    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function list_products_DAO($db) {
        $sql = "SELECT * FROM cuadros";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);

    }

    public function details_products_DAO($db,$id) {
        $sql = "SELECT * FROM cuadros WHERE Codigo="."'".$id."'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);

    }

}
