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
                . " Pastel, Tinta, Cera, Categoria,Imagen,Marco,Material_Marco,Estilo_Marco, Color_Marco)"
                . " VALUES ('$cod_cuadro', '$nombre_cuadro', '$precio_cuadro','$nombre_artista',"
                . " '$fecha_creacion', '$fecha_stock', '$dimension_cuadro', '$oleo', '$spray',"
                . " '$pastel', '$tinta', '$cera', '$categoria_cuadro','$avatar','$marco_disponible','$material_marco','$estilo_marco','$color_marco')";

        return $db->ejecutar($sql);
    }

}
