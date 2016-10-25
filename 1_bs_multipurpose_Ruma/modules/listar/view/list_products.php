<section class="head-main-img">
    <div class="container">
        <div class="row text-center pad-row" >
            <div class="col-md-12">
              <h1>  LISTAR CUADRO </h1>
            </div>
        </div>
    </div>
</section>
    <!--/.HEADING END-->
<section >
    <div class="container">
        <div id="list_prod" class="row text-center pad-row">
            <br>
            <br>
            <br>
            <br>
            <?php
            if (isset($arrData) && !empty($arrData)) {
                foreach ($arrData as $product) {
                    //echo $productos['id'] . " " . $productos['nombre'] . "</br>";
                    //echo $productos['descripcion'] . " " . $productos['precio'] . "</br>";
                    ?>
                    <a id="prod" href="index.php?module=listar&cod_cuadro=<?php echo $product['Codigo'] ?>" >
                        <img class="prodImg" src=<?php echo $product['Imagen'] ?> alt="product" >
                        <p><?php echo $product['Titulo'] ?></p>
                        <p id="p2"><?php echo $product['Precio'] ?>€</p>
                    </a>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
