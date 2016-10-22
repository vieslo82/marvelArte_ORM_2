<?php
//Función para Validar Productos con PHP
function validate_products($value) {

    $error = array();
    $valido = true;
    $filtro = array(
        'cod_cuadro' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[A-Za-z]{3}[0-9]{4}$/')
        ),
        'nombre_cuadro' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[A-Za-z]{2,30}$/')
        ),
        'precio_cuadro' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[1-9]{3,8}$/')
        ),
        'fecha_creacion' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](19|20)\d\d$/')
        ),
        'fecha_stock' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](19|20)\d\d$/')

        ),
    );

    $resultado = filter_var_array($value, $filtro);//
    //return $resultado;


    //Valores no filtrados con Expresiones Regulares
    $resultado['nombre_artista'] = $value['nombre_artista'];
    $resultado['dimension_cuadro'] = $value['dimension_cuadro'];
    $resultado['tecnica_cuadro'] = $value['tecnica_cuadro'];
    $resultado['categoria_cuadro'] = $value['categoria_cuadro'];
    $resultado['pais'] = $value['pais'];
    $resultado['provincia'] = $value['provincia'];
    $resultado['poblacion'] = $value['poblacion'];
    $resultado['marco_disponible'] = $value['marco_disponible'];
    $resultado['material_marco'] = $value['material_marco'];
    $resultado['color_marco'] = $value['color_marco'];
    $resultado['estilo_marco'] = $value['estilo_marco'];

//-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/-/--/-/


    if ($resultado['fecha_stock']) {

        $dates = validar_fecha_stock($value['fecha_stock']);

        if (!$dates) {
            $error['fecha_stock'] = 'Debe ser igual a la fecha actual';
            $valido = false;
        }
    }

    if ($resultado['fecha_creacion'] && $resultado['fecha_stock']) {//Comparamos FECHA CREACION sea <= FECHA STOCK

        $dates = valida_dates($value['fecha_creacion'], $value['fecha_stock']);

        if (!$dates) {
            $error['fecha_creacion'] = 'La Fecha Creacion debe ser menor o igual a Fecha Stock';
            $valido = false;
        }
    }

    if ($value['nombre_artista'] === 'selecciona') {
        $error['nombre_artista'] = "Selecciona Artista ";
        $valido = false;
    }

    if ($value['dimension_cuadro'] === "") {
        $error['dimension_cuadro'] = "Selecciona solo una opcion";
        $valido =  false;
    }

    if ($value['tecnica_cuadro'] === "") {
        $error['tecnica_cuadro'] = "Selecciona al menos una opción";
        $valido =  false;
    }

    if ($value['categoria_cuadro'] === 'selecciona') {
        $error['categoria_cuadro'] = "Selecciona al menos una opción";
        $valido = false;
    }
    /*
    if ($value['marco_disponible'] === "") {
        $error['marco_disponible'] = "Selecciona solo una opcion";
        $valido =  false;
    }
    if ($value['color_marco'] === 'selecciona') {
        $error['color_marco'] = "Selecciona al menos una opción";
        $valido = false;
    }

    if ($value['material_marco'] === 'selecciona') {
        $error['material_marco'] = "Selecciona al menos una opción";
        $valido = false;
    }

    if ($value['estilo_marco'] === 'selecciona') {
        $error['estilo_marco'] = "Selecciona al menos una opción";
        $valido = false;
    }


*/
    if ($resultado != null && $resultado) {

        if (!$resultado['cod_cuadro']) {
            $error['cod_cuadro'] = 'Codigo debe tener de 3 letras y 4 números';
            $valido = false;
        }


        if (!$resultado['nombre_cuadro']) {
            $error['nombre_cuadro'] = 'Nombre del cuadro debe tener de 2 a 30 letras';
            $valido = false;
        }

        if (!$resultado['precio_cuadro']) {
            $error['precio_cuadro'] = 'Precio debe tener de 3 a 8 cifras';
            $valido = false;
        }


        if (!$resultado['fecha_creacion']) {
            if ($_POST['fecha_creacion'] == "") {
                $error['fecha_creacion'] = "Campo no puedes estar vacio";
                $valido = false;
            } else {
                $error['fecha_creacion'] = 'Error formato (dd/mm/yyyy)';
                $valido = false;
            }
        }

        if (!$resultado['fecha_stock']) {
            if ($_POST['fecha_stock'] == "") {
                $error['fecha_stock'] = "Campo no puedes estar vacio";
                $valido = false;
            } else {
                $error['fecha_stock'] = 'Error formato (dd/mm/yyyy)';
                $valido = false;
            }
        }
    } else {
        $valido = false;
    };
    return $return = array('resultado' => $valido, 'error' => $error, 'datos' => $resultado);
}//FIN Funcion validar productos con PHP

//FUNCION VALIDAR DOS FECHAS
function valida_dates($enter_date,$obsolescense_date) {
    $day1=substr($enter_date, 0,2);
    $month1=substr($enter_date, 3,2);
    $year1=substr($enter_date, 6,4);
    $day2=substr($obsolescense_date, 0,2);
    $month2=substr($obsolescense_date, 3,2);
    $year2=substr($obsolescense_date, 6,4);

    if ($enter_date<=$obsolescense_date) {
        return true;
    }

    return false;
}


//Funcion en la que FECHA DE STOCK DEBE SER IGUAL A LA DEL SISTEMA
function validar_fecha_stock($fechaStock) {
    //$fecha = date('d-m-Y');
    $fecha = date("d/m/Y");
    //$fecha = strftime($fecha);


    if($fecha == $fechaStock){
        return true;
    }

    return false;
}
