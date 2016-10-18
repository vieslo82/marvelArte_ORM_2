<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css">
<script type="text/javascript" src="modules/products/view/js/products.js" ></script>

<section class="head-main-img">
    <div class="container">
        <div class="row text-center pad-row" >
            <div class="col-md-12">
              <h1>  FORMULARIO ALTA CUADRO </h1>
            </div>
        </div>
    </div>
</section>
    <!--/.HEADING END-->

	<div id="form_container">
	    <h1><a></a></h1>
		<form id="form_products" class="appnitro">
			<ul >

			    <li id="li_1" >
                <label class="description" for="element_1">Código Cuadro </label>
		        <div>
			        <input id="cod_cuadro" name="cod_cuadro" class="element text medium" type="text" maxlength="255" value="" >
                        <div id="e_cod_cuadro_"></div>
		        </div>
		        </li>

		        <li id="li_2" >
		        <label class="description" for="element_2">Cuadro </label>
		        <div>
			        <input id="nombre_cuadro" name="nombre_cuadro" class="element text medium" type="text" maxlength="255" value="">
                        <div id="e_nombre_cuadro"></div>
		        </div>
		        </li>

		        <li id="li_3" >
		        <label class="description" for="element_3">Precio </label>
		        <span class="symbol">€</span>
		        <span>
		        <input id="precio_cuadro" name="precio_cuadro" class="element text currency" size="10" type="text" value="" >
                        <div id="e_precio_cuadro_"></div>
		        </span>
		        </li>

		       <li id="li_4" >
		        <label class="description" for="element_4">Artista </label>
		        <div>
		            <select class="element select medium" id="nombre_artista" name="nombre_artista">


                    <option value="selecciona" selected>selecciona</option>
                    <option value="Stan_Lee" >Stan Lee</option>
                    <option value="Kevin_Nowlan" >Kevin Nowlan</option>
                    <option value="John_Beatty" >John Beatty</option>
                    <option value="David_Ross" >David Ross</option>
                    <option value="Stefano_Caselli" >Stefano Caselli</option>
                    <option value="David_Marquez" >David Marquez</option>
                    <option value="Andy_Brase" >Andy Brase</option>
                    <option value="Brittney_Williams" >Brittney Williams</option>
                    <option value="Chris_Warner" >Chris Warner</option>

                    </select>
		        </div>
		        </li>
		        <li id="li_1" >
		        <label class="description" for="element_1">Fecha Creación</label>
		        <span>
					<input id="fecha_creacion" type="text" name="fecha_creacion" class="element text" value="">
                        <div id="e_fecha_creacion_"></div>
		 		</span>
        		</li>

		        <li id="li_5" >
		        <label class="description" for="element_5">Fecha Stock</label>
		        <span>
					<input id="fecha_stock" type="text" name="fecha_stock" class="element text" value="">
                        <div id="e_fecha_stock"></div>
		 		</span>
        		</li>

        		<li id="li_6" >
            	<label class="description" for="element_6">Dimensiones (cm) </label>
            	<span>
			        <input id="dimension_cuadro" name="dimension_cuadro" class="element radio" type="radio" value="22X14" />
                <label class="choice" for="element_5_1">22 X 14</label>
                    <input id="dimension_cuadro" name="dimension_cuadro" class="element radio" type="radio" value="35X24" />
                <label class="choice" for="element_5_2">35 X 24</label>
                    <input id="dimension_cuadro" name="dimension_cuadro" class="element radio" type="radio" value="55X38" />
                <label class="choice" for="element_5_3">55 X 38</label>
                    <input id="dimension_cuadro" name="dimension_cuadro" class="element radio" type="radio" value="81X60" />
                <label class="choice" for="element_5_4">81 X 60</label>
                 <div id="e_dimension_cuadro_"></div>
                </span>
		        </li>

		        <li id="li_7" >
        		<label class="description" for="element_7">Técnica </label>
        		<span> <!-- class = "element checkbox" ESTA ES LA CLASE ORGINAL-->
        			<input id="" name="tecnica_cuadro[]" class="element checkbox" type="checkbox" value="oleo" />
                <label class="choice" for="element_6_1">Oleo</label>
                    <input id="" name="tecnica_cuadro[]" class="element checkbox" type="checkbox" value="spray" />
                <label class="choice" for="element_6_2">Aerografía</label>
                    <input id="" name="tecnica_cuadro[]" class="element checkbox" type="checkbox" value="pastel" />
                <label class="choice" for="element_6_3">Pastel</label>
                    <input id="" name="tecnica_cuadro[]" class="element checkbox" type="checkbox" value="tinta" />
                <label class="choice" for="element_6_4">Tinta</label>
                    <input id="" name="tecnica_cuadro[]" class="element checkbox" type="checkbox" value="cera" />
                <label class="choice" for="element_6_5">Cera</label>
                <div id="e_interests"></div>
                </span>
		        </li>

		        <li id="li_8" >
		        <label class="description" for="element_8">Categoría </label>
		        <div>
		            <select class="element select medium" id="categoria_cuadro" name="categoria_cuadro">
                    <option value="selecciona" selected=>selecciona</option>
                    <option value="Capitan_America" >Capitán América</option>
                    <option value="Daredevil" >Daredevil</option>
                    <option value="Duende_Verde" >Duende Verde</option>
                    <option value="Hulk" >Hulk</option>
                    <option value="Jessica_Jones" >Jessica Jones</option>
                    <option value="Vengadores" >Los Vengadores</option>
                    <option value="Punisher" >Punisher</option>
                    <option value="Viuda_Negra" >Viuda Negra</option>
                    <option value="Xmen" >X-Men</option>

                    </select>
                        <div id="e_categoria_cuadro_"></div>
		        </div>

		         <li id="li_8" >
		          <label class="description" for="element_8">Subir Imagen </label>
		        <div>
		            <div id="progress" class="form-group">
                        <div id="bar"></div>
                        <div id="percent">0%</div >
                    </div>

                    <div class="msg"></div>
                    <br/>
                    <div id="dropzone" class="dropzone"></div><br/>
		        </div>

            <li id="li_9" >
            <label class="description" for="element_9">País </label>
            <div>
              <select class="element select medium" id="pais" name="pais">
             </select>
             <div id="e_pais"></div>
            </div>

            <li id="li_10" >
            <label class="description" for="element_10">Provincia</label>
            <div>
            <select class="element select medium" id="provincia" name="provincia">
            </select>
            <div id="e_provincia"></div>
            </div>

            <li id="li_11" >
            <label class="description" for="element_11">Poblacion</label>
            <div>
            <select class="element select medium" id="poblacion" name="poblacion">
            </select>
            <div id="e_poblacion"></div>
            </div>

		        </li>
		        	<li id="li_12" >
            	<label class="description" for="element_12">Marco</label>
            	<span>
			        <input id="marco_disponible" name="marco_disponible" class="element radio" type="radio" value="si" />
                <label class="choice" for="element_5_1">SI</label>
                    <input id="marco_disponible" name="marco_disponible" class="element radio" type="radio" value="no" />
                <label class="choice" for="element_5_2">NO</label>
                 <div id="e_marco_disponible_"></div>
                </span>
		        </li>

		        <li id="li_13" >
		        <label class="description" for="element_13">Material Marco </label>
		        <div>
		            <select class="element select medium" id="material_marco" name="material_marco">
                        <option value="selecciona" selected>selecciona</option>
                        <option value="madera" >Madera</option>
                        <option value="pvc" >Pvc</option>
                        <option value="aluminio" >Aluminio</option>
                    </select>
                        <div id="e_material_marco_"></div>
		        </div>


		        <li id="li_14" >
		        <label class="description" for="element_14">Color Marco </label>
		        <div>
		            <select class="element select medium" id="color_marco" name="color_marco">
                        <option value="selecciona" selected>selecciona</option>
                        <option value="Rojo" >Rojo</option>
                        <option value="Blanco" >Blanco</option>
                        <option value="Negro" >Negro</option>
                        <option value="Amarillo" >Amarillo</option>
                        <option value="Original" >Original</option>
                    </select>
                        <div id="e_color_marco_"></div>
		        </div>

            <li id="li_15" >
            <label class="description" for="element_15">Estilo Marco </label>
            <div>
            <select class="element select medium" id="estilo_marco" name="estilo_marco">
                  <option value="selecciona" selected>selecciona</option>
                  <option value="frances" >Frances</option>
                  <option value="moderno" >Moderno</option>
                  <option value="rustico" >Rústico</option>
                  <option value="barroco" >Barroco</option
            </select>
            <div id="e_estilo_marco"></div>
            </div>


		    <div>
				<li class="buttons">
			    <input type="hidden" name="form_id" value="1157508" />

				<input id="submit_Products" class="button_text" type="button" name="submit_Products_" value="Submit" />
				</div>
        </li>
			</ul>
		</form>
	</div>
