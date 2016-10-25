<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/php/marvelArte_ORM_2/1_bs_multipurpose_Ruma/model/Conf.class.singleton.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/php/marvelArte_ORM_2/1_bs_multipurpose_Ruma/utils/common.inc.php");
$path = $_SERVER['DOCUMENT_ROOT'] . '/php/marvelArte_ORM_2/1_bs_multipurpose_Ruma/';

define('SITE_ROOT', $path);
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

if ($_GET["cod_cuadro"]) {

    $id = $_GET["cod_cuadro"];
      //echo $id;
    $path_model = SITE_ROOT . '/modules/listar/model/model/';
    $arrValue = loadModel($path_model, "listar_model", "details_products",$id);
print_r($arrValue[0]);
    if ($arrValue[0]) {
        loadView('modules/listar/view/', 'details_products.php', $arrValue[0]);
    } else {
        $message = "NOT FOUND PRODUCT";
        loadView('view/inc/', '404.php', $message);
    }
} else {
    $path_model = SITE_ROOT . '/modules/listar/model/model/';
    $arrValue = loadModel($path_model, "listar_model", "list_products");
//print_r($arrValue);
    if ($arrValue) {
        loadView('modules/listar/view/', 'list_products.php', $arrValue);
    } else {
        $message = "NOT PRODUCTS";
        loadView('view/inc/', '404.php', $message);
    }
}
