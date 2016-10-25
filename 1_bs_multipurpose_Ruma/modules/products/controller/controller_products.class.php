<?php
    session_start();
    include ($_SERVER['DOCUMENT_ROOT'] . "/php/marvelArte_ORM_2/1_bs_multipurpose_Ruma/modules/products/utils/functions_products.inc.php");
    include ($_SERVER['DOCUMENT_ROOT'] . "/php/marvelArte_ORM_2/1_bs_multipurpose_Ruma/utils/upload.php");
    include ($_SERVER['DOCUMENT_ROOT'] . "/php/marvelArte_ORM_2/1_bs_multipurpose_Ruma/utils/common.inc.php");
    include ($_SERVER['DOCUMENT_ROOT'] . "/php/marvelArte_ORM_2/1_bs_multipurpose_Ruma/model/Conf.class.singleton.php");


    ///////////////////////////////////
    if ((isset($_GET["upload"])) && ($_GET["upload"] == true)) {
        $result_avatar = upload_files();
        //echo json_encode($result_avatar);
        //exit;
        $_SESSION['result_avatar'] = $result_avatar;
    }
    ///////////////////////////////////


    if ((isset($_POST['discharge_products_json']))) {
    	discharge_products();
    }

    function discharge_products() {
    	$jsondata = array();

    	//Transformamos JSON a Datos normales.
    	$productsJSON = json_decode($_POST["discharge_products_json"], true);

    	$result = validate_products($productsJSON);


        if (empty($_SESSION['result_avatar'])) {
            $_SESSION['result_avatar'] = array('resultado' => true, 'error' => "", 'datos' => 'media/default-avatar.jpg');
        }

        $result_avatar = $_SESSION['result_avatar'];


        if (($result['resultado']) && ($result_avatar['resultado'])) {
            $arrArgument = array(
                'cod_cuadro' => strtoupper ($result['datos']['cod_cuadro']),
                'nombre_cuadro' => strtoupper ($result['datos']['nombre_cuadro']),
                'precio_cuadro' => $result['datos']['precio_cuadro'],
                'nombre_artista' => strtoupper($result['datos']['nombre_artista']),
                'fecha_creacion' => $result['datos']['fecha_creacion'],
                'fecha_stock' => $result['datos']['fecha_stock'],
                'dimension_cuadro' => $result['datos']['dimension_cuadro'],
                'tecnica_cuadro' => $result['datos']['tecnica_cuadro'],
                'categoria_cuadro' => strtoupper($result['datos']['categoria_cuadro']),
                'pais' => strtoupper($result['datos']['pais']),
                'provincia' => strtoupper($result['datos']['provincia']),
                'poblacion' => strtoupper($result['datos']['poblacion']),
                'marco_disponible' => strtoupper($result['datos']['marco_disponible']),
                'material_marco' => strtoupper($result['datos']['material_marco']),
                'color_marco' => strtoupper($result['datos']['color_marco']),
                'estilo_marco' => strtoupper($result['datos']['estilo_marco']),

                'avatar' => $result_avatar['datos']
            );

          /////////////////insert into BD////////////////////////
        $arrValue = false;
        $path_model = $_SERVER['DOCUMENT_ROOT'] . '/php/marvelArte_ORM_2/1_bs_multipurpose_Ruma/modules/products/model/model/';
        $arrValue = loadModel($path_model, "product_model", "create_product", $arrArgument);
        //echo json_encode($arrValue);
        //die();

        if ($arrValue)
            $mensaje = "El producto ha sido de alta correctamente";
        else
            $mensaje = "No se ha podido registrar el producto";

            //redirigir a otra p�gina con los datos de $arrArgument y $mensaje
        $_SESSION['product'] = $arrArgument;
        $_SESSION['msje'] = $mensaje;
        $callback = "index.php?module=products&view=results_products3";

        $jsondata["success"] = true;
        $jsondata["redirect"] = $callback;
        echo json_encode($jsondata);
        exit;
          //-------
    	}
    	else {
            //$error = $result['error'];
            //$error_avatar = $result_avatar['error'];
            $jsondata["success"] = false;
            $jsondata["error"] = $result['error'];
            $jsondata["error_avatar"] = $result_avatar['error'];

            $jsondata["success1"] = false;
            if ($result_avatar['resultado']) {
                $jsondata["success1"] = true;
                $jsondata["img_avatar"] = $result_avatar['datos'];
            }
            header('HTTP/1.0 400 Bad error');
            echo json_encode($jsondata);
            exit;
        }
    }//FIN Function discharge_products;

    //////////////////////////////////////////////////////////

        if (isset($_GET["delete"]) && $_GET["delete"] == true) {

            $_SESSION['result_avatar'] = array();
            $result = remove_files();
            //echo json_encode($result);//ESTO ES PARA PROBAR DESPUES ELIMINAR
    	    //exit;//ESTO ES PARA PROBAR DESPUES ELIMINAR
    	    if ($result === true) {
            echo json_encode(array("res" => true));
            } else {
            echo json_encode(array("res" => false));
            }
        }

    //////////////////////////////////////////////////////////

    if (isset($_GET["load"]) && $_GET["load"] == true) {
        $jsondata = array();
        if (isset($_SESSION['product'])) {
            //echo debug($_SESSION['product']);
            $jsondata["user"] = $_SESSION['product'];
        }
        if (isset($_SESSION['msje'])) {
            //echo $_SESSION['msje'];
            $jsondata["msje"] = $_SESSION['msje'];
        }
        close_session();
        echo json_encode($jsondata);
        exit;
    }

    ///////////////////////////////////////////////////
    function close_session() {
        unset($_SESSION['product']);
        unset($_SESSION['msje']);
        $_SESSION = array(); // Destruye todas las variables de la sesión
        session_destroy(); // Destruye la sesión
    }

    if ((isset($_GET["load_data"])) && ($_GET["load_data"] == true)) {
        $jsondata = array();

        if (isset($_SESSION['product'])) {
            $jsondata["user"] = $_SESSION['product'];
            echo json_encode($jsondata);
            exit;
        } else {
            $jsondata["user"] = "";
            echo json_encode($jsondata);
            exit;
        }
    }

    //////////////////////////////////////////////////////////////////////

    /////////////////////////////////////////////////// load_pais
if(  (isset($_GET["load_pais"])) && ($_GET["load_pais"] == true)  ){

//echo "CARGANDO PAISES";

  $json = array();
  $url = 'http://www.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/ListOfCountryNamesByName/JSON';

//echo $_SERVER['DOCUMENT_ROOT'];
  $path_model=$_SERVER['DOCUMENT_ROOT'].'/php/marvelArte_ORM_2/1_bs_multipurpose_Ruma/modules/products/model/model/';

  $json = loadModel($path_model, "product_model", "obtain_paises", $url);

  if($json){
    echo $json;
    exit;
  }else{
    $json = "error";
    echo $json;
    exit;
  }
}

/////////////////////////////////////////////////// load_provincias
if(  (isset($_GET["load_provincias"])) && ($_GET["load_provincias"] == true)  ){
  $jsondata = array();
      $json = array();

  $path_model=$_SERVER['DOCUMENT_ROOT'].'/php/marvelArte_ORM_2/1_bs_multipurpose_Ruma/modules/products/model/model/';

  $json = loadModel($path_model, "product_model", "obtain_provincias");

  if($json){
    $jsondata["provincias"] = $json;
    echo json_encode($jsondata);
    exit;
  }else{
    $jsondata["provincias"] = "error";
    echo json_encode($jsondata);
    exit;
  }
}

/////////////////////////////////////////////////// load_poblaciones
if(  isset($_POST['idPoblac']) ){
    $jsondata = array();
      $json = array();

  $path_model=$_SERVER['DOCUMENT_ROOT'].'/php/marvelArte_ORM_2/1_bs_multipurpose_Ruma/modules/products/model/model/';
  $json = loadModel($path_model, "product_model", "obtain_poblaciones", $_POST['idPoblac']);

  if($json){
    $jsondata["poblaciones"] = $json;
    echo json_encode($jsondata);
    exit;
  }else{
    $jsondata["poblaciones"] = "error";
    echo json_encode($jsondata);
    exit;
  }
}
