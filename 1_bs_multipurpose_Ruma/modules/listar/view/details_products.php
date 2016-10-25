<section >
    <div class="container">
        <div id="details_prod" class="row text-center pad-row">
            <ol class="breadcrumb">
                <li><a href="index.php?module=listar">Detalles Products</a></li>
                <li class="active">Details Product</li>
            </ol>
            <br>
            <br>
            <?php
            //print_r($producto);
            //die();
            echo "<br>";
            echo "<br>";
            if (isset($arrData) && !empty($arrData)) {
                ?>
                <div id="details" class="col-md-4  col-sm-4">
                    <!--<i class="fa fa-desktop fa-5x"></i>-->
                    <!--<img src="view/img/product.jpg" alt="product" height="70" width="70">-->
                    <img class="prodImg" src="<?php echo $arrData['Imagen'] ?>" alt="product">

                    <div id="container">
                        <h4> <strong><?php echo $arrData['Titulo'] ?></strong> </h4>
                        <br />
                        <p>
                            <strong>Artista: <br/></strong><?php echo $arrData['Artista'] ?>
                        </p>
                        <p>
                            <strong>Categoria:</strong> <?php echo $arrData['Categoria'] ?>
                        </p>
                        <h2> <strong>Price: <?php echo $arrData['Precio'] ?>€</strong> </h5>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
