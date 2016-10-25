<?php
class productDAO {

    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_product_DAO($db, $arrArgument) {
        $cod_cuadro = $arrArgument['cod_cuadro'];
        $nombre_cuadro = $arrArgument['nombre_cuadro'];
        $precio_cuadro = $arrArgument['precio_cuadro'];
        $nombre_artista = $arrArgument['nombre_artista'];
        $fecha_creacion = $arrArgument['fecha_creacion'];
        $fecha_stock = $arrArgument['fecha_stock'];
        $dimension_cuadro = $arrArgument['dimension_cuadro'];
        $tecnica_cuadro = $arrArgument['tecnica_cuadro'];
        $categoria_cuadro = $arrArgument['categoria_cuadro'];
        $pais = $arrArgument['pais'];
        $provincia = $arrArgument['provincia'];
        $poblacion = $arrArgument['poblacion'];
        $marco_disponible = $arrArgument['marco_disponible'];
        $material_marco = $arrArgument['material_marco'];
        $color_marco = $arrArgument['color_marco'];
        $estilo_marco = $arrArgument['estilo_marco'];
        $avatar = $arrArgument['avatar'];

        $oleo = 0;
        $spray = 0;
        $pastel = 0;
        $tinta = 0;
        $cera = 0;

        foreach ($tecnica_cuadro as $indice) {
            if ($indice === 'oleo')
                $oleo = 1;
            if ($indice === 'spray')
                $spray = 1;
            if ($indice === 'pastel')
                $pastel = 1;
            if ($indice === 'tinta')
                $tinta = 1;
            if ($indice === 'cera')
                $cera = 1;
        }

        $sql = "INSERT INTO cuadros (Codigo, Titulo, Precio, Artista,"
                . " Fecha_Creacion, Fecha_Stock, Dimensiones, Oleo, Spray,"
                . " Pastel, Tinta, Cera, Categoria,Imagen,Pais,Provincia,"
                . " Poblacion,Marco,Material_Marco,Estilo_Marco, Color_Marco)"
                . " VALUES ('$cod_cuadro', '$nombre_cuadro', '$precio_cuadro','$nombre_artista',"
                . " '$fecha_creacion', '$fecha_stock', '$dimension_cuadro', '$oleo', '$spray',"
                . " '$pastel', '$tinta', '$cera', '$categoria_cuadro','$avatar','$pais','$provincia',"
                . "'$poblacion','$marco_disponible','$material_marco','$estilo_marco','$color_marco')";

        return $db->ejecutar($sql);
    }

    public function obtain_paises_DAO($url) {
         $ch = curl_init();
         curl_setopt ($ch, CURLOPT_URL, $url);
         curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
         $file_contents = curl_exec($ch);
         curl_close($ch);
         
         return ($file_contents) ? $file_contents : FALSE;
     }

       public function obtain_provincias_DAO() {
           $json = array();
       $tmp = array();

       $provincias = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/php/marvelArte_ORM_2/1_bs_multipurpose_Ruma/resources/provinciasypoblaciones.xml');
       $result = $provincias->xpath("/lista/provincia/nombre | /lista/provincia/@id");
       for ($i=0; $i<count($result); $i+=2) {
         $e=$i+1;
         $provincia=$result[$e];

         $tmp = array(
           'id' => (string) $result[$i], 'nombre' => (string) $provincia
         );
         array_push($json, $tmp);
       }
           return $json;
       }

       public function obtain_poblaciones_DAO($arrArgument) {
           $json = array();
       $tmp = array();

           $filter = (string)$arrArgument;
         $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/php/marvelArte_ORM_2/1_bs_multipurpose_Ruma/resources/provinciasypoblaciones.xml');
       $result = $xml->xpath("/lista/provincia[@id='$filter']/localidades");

         for ($i=0; $i<count($result[0]); $i++) {
           $tmp = array(
             'poblacion' => (string) $result[0]->localidad[$i]
           );
           array_push($json, $tmp);
         }
           return $json;
       }

}
