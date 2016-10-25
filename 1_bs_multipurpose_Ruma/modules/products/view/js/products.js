jQuery.fn.fill_or_clean = function() { //FUNCION PARA LIMPIAR CUANDO FOCUS ESTE ENCIMA
    this.each(function() {
        if ($("#cod_cuadro").attr("value") === "") {
            $("#cod_cuadro").attr("value", "Introduce codigo producto");
            $("#cod_cuadro").focus(function() {
                if ($("#cod_cuadro").attr("value") == "Introduce codigo producto") {
                    $("#cod_cuadro").attr("value", "");
                }
            });
        }
        $("#cod_cuadro").blur(function() { //Onblur se activa cuando el usuario retira el foco
            if ($("#cod_cuadro").attr("value") === "") {
                $("#cod_cuadro").attr("value", "Introduce codigo producto");
            }
        });

        if ($("#nombre_cuadro").attr("value") === "") {
            $("#nombre_cuadro").attr("value", "Introduce nombre del cuadro");
            $("#nombre_cuadro").focus(function() {
                if ($("#nombre_cuadro").attr("value") == "Introduce nombre del cuadro") {
                    $("#nombre_cuadro").attr("value", "");
                }
            });
        }
        $("#nombre_cuadro").blur(function() {
            if ($("#nombre_cuadro").attr("value") === "") {
                $("#nombre_cuadro").attr("value", "Introduce nombre del cuadro");
            }
        });
        if ($("#precio_cuadro").attr("value") === "") {
            $("#precio_cuadro").attr("value", "Precio");
            $("#precio_cuadro").focus(function() {
                if ($("#precio_cuadro").attr("value") == "Precio") {
                    $("#precio_cuadro").attr("value", "");
                }
            });
        }
        $("#precio_cuadro").blur(function() {
            if ($("#precio_cuadro").attr("value") === "") {
                $("#precio_cuadro").attr("value", "Precio");
            }
        });

        if ($("#fecha_creacion").attr("value") === "") {
            $("#fecha_creacion").attr("value", "Introduce fecha creacion");
            $("#fecha_creacion").focus(function() {
                if ($("#fecha_creacion").attr("value") == "Introduce fecha creacion") {
                    $("#fecha_creacion").attr("value", "");
                }
            });
        }
        $("#fecha_creacion").blur(function() {
            if ($("#fecha_creacion").attr("value") === "") {
                $("#fecha_creacion").attr("value", "Introduce fecha creacion");
            }
        });
        if ($("#fecha_stock").attr("value") === "") {
            $("#fecha_stock").attr("value", "Introduce fecha stock");
            $("#fecha_stock").focus(function() {
                if ($("#fecha_stock").attr("value") == "Introduce fecha stock") {
                    $("#fecha_stock").attr("value", "");
                }
            });
        }
        $("#fecha_stock").blur(function() {
            if ($("#fecha_stock").attr("value") === "") {
                $("#fecha_stock").attr("value", "Introduce fecha stock");
            }
        });

    }); //each
    return this;
}; //function LIMPIAR

//-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_

Dropzone.autoDiscover = false; //Solution to : "Uncaught Error: Dropzone already attached."

$(document).ready(function() {
    $(this).fill_or_clean(); //CARGAMOS FUNCION LIMPIAR

    //Cuando Pulsamos Boton Formulario Validamos Productos
    $('#submit_Products').click(function() {
        validate_products(); //
    });

    //-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_
    //Dropzone Función //////////////////////////////////
    $("#dropzone").dropzone({
        url: "modules/products/controller/controller_products.class.php?upload=true",
        addRemoveLinks: true,
        maxFileSize: 1000,
        dictResponseError: "An error has occurred on the server",
        acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd',
        init: function() { //Maneja barra de carga y mensaje
            this.on("success", function(file, response) {

                //console.log(response);

                $("#progress").show();
                $("#bar").width('100%');
                $("#percent").html('100%');
                $('.msg').text('').removeClass('msg_error');
                $('.msg').text('Success Upload image!!').addClass('msg_ok').animate({
                    'right': '300px'
                }, 300);


            });
        },
        complete: function(file) {
            //if(file.status == "success"){
            //alert("El archivo se ha subido correctamente: " + file.name);
            //}
        },
        error: function(file) {
            //alert("Error subiendo el archivo " + file.name);
        },
        removedfile: function(file, serverFileName) {
            var name = file.name;
            $.ajax({
                type: "POST",
                url: "modules/products/controller/controller_products.class.php?delete=true",
                data: "filename=" + name,
                success: function(data) {

                    $("#progress").hide();
                    $('.msg').text('').removeClass('msg_ok');
                    $('.msg').text('').removeClass('msg_error');
                    $("#e_avatar").html("");

                    var json = JSON.parse(data);
                    if (json.res === true) {
                        var element;
                        if ((element == file.previewElement) !== null) {
                            element.parentNode.removeChild(file.previewElement);
                            //alert("Imagen eliminada: " + name);
                        } else {
                            false;
                        }
                    } else { //json.res == false, elimino la imagen también
                        var element;
                        if ((element == file.previewElement) !== null) {
                            element.parentNode.removeChild(file.previewElement);
                        } else {
                            false;
                        }
                    }
                }
            });
        }
    }); //FIN Dropzone Función

    //-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-

    //Utilizamos las expresiones regulares para las funciones de fadeout

    var date_reg = /^(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](19|20)\d\d$/;
    //var date_reg = /^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$/;
    var address_reg = /^[a-z0-9- -.]+$/i;
    var pass_reg = /^[0-9a-zA-Z]{6,32}$/;
    var string_reg = /^[A-Za-z]{2,30}$/;
    var usr_reg = /^[0-9a-zA-Z]{2,20}$/;
    var precio = /^[1-9]{3,8}$/; //PATTERN PRECIO
    var codigo = /^[A-Za-z]{3}[0-9]{4}$/; //PATTERN CODIGO = 3 letras + 4 números

    //realizamos funciones para que sea más práctico nuestro formulario
    $("#cod_cuadro").keyup(function() {
        if ($(this).val() !== "" && codigo.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });


    $("#nombre_cuadro").keyup(function() {
        if ($(this).val() !== "" && string_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });


    $("#precio_cuadro").keyup(function() {
        if ($(this).val() !== "" && precio.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });


    $("#fecha_creacion, #fecha_stock").keyup(function() {
        if ($(this).val() !== "" && date_reg.test($(this).val())) {
            $(".error").fadeOut();
            return false;
        }
    });


    //-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-

    load_countries_v1();
    $("#provincia").empty();
    $("#provincia").append('<option value="" selected="selected">Selecciona una Provincia</option>');
    $("#provincia").prop('disabled', true);
    $("#poblacion").empty();
    $("#poblacion").append('<option value="" selected="selected">Selecciona una Poblacion</option>');
    $("#poblacion").prop('disabled', true);

    $("#pais").change(function() {
        var pais = $(this).val();
        var provincia = $("#provincia");
        var poblacion = $("#poblacion");

        if (pais !== 'ES') {
            provincia.prop('disabled', true);
            poblacion.prop('disabled', true);
            $("#provincia").empty();
            $("#poblacion").empty();
        } else {
            provincia.prop('disabled', false);
            poblacion.prop('disabled', false);
            load_provincias_v1();
        } //fi else
    });

    $("#provincia").change(function() {
        var prov = $(this).val();
        if (prov > 0) {
            load_poblaciones_v1(prov);
        } else {
            $("#poblacion").prop('disabled', false);
        }
    });

}); //FIN Document.Ready _-_-_-_-_-_-_-_-_-_

//-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
//Funciones para cargar los Dependent Dropdown
function load_countries_v2(cad) {

    $.getJSON(cad, function(data) {
            //console.log(data);
            $("#pais").empty();
            $("#pais").append('<option value="" selected="selected">Selecciona un Pais</option>');

            $.each(data, function(i, valor) {
                $("#pais").append("<option value='" + valor.sISOCode + "'>" + valor.sName + "</option>");
            });
        })
        .fail(function() {
            console.log("error load_countries");
            //alert( "error load_countries" );
        });
}

function load_countries_v1() {
    $.get("modules/products/controller/controller_products.class.php?load_pais=true",

          function(response) {
  console.log(response);
                if (response === 'error') {
                    load_countries_v2("resources/ListOfCountryNamesByName.json");
                } else {
                    load_countries_v2("modules/products/controller/controller_products.class.php?load_pais=true"); //oorsprong.org
                }
            })
        .fail(function(response) {
            load_countries_v2("resources/ListOfCountryNamesByName.json");
        });
}

function load_provincias_v2() {
    $.get("resources/provinciasypoblaciones.xml", function(xml) {
            $("#provincia").empty();
            $("#provincia").append('<option value="" selected="selected">Selecciona una Provincia</option>');

            $(xml).find("provincia").each(function() {
                var id = $(this).attr('id');
                var nombre = $(this).find('nombre').text();
                $("#provincia").append("<option value='" + id + "'>" + nombre + "</option>");
            });
        })
        .fail(function() {
            alert("error load_provincias");
        });
}

function load_provincias_v1() { //provinciasypoblaciones.xml - xpath
    $.get("modules/products/controller/controller_products.class.php?load_provincias=true",
            function(response) {
                $("#provincia").empty();
                $("#provincia").append('<option value="" selected="selected">Selecciona una Provincia</option>');

                //alert(response);
                var json = JSON.parse(response);
                var provincias = json.provincias;
                //alert(provincias);
                //console.log(provincias);

                //alert(provincias[0].id);
                //alert(provincias[0].nombre);

                if (provincias === 'error') {
                    load_provincias_v2();
                } else {
                    for (var i = 0; i < provincias.length; i++) {
                        $("#provincia").append("<option value='" + provincias[i].id + "'>" + provincias[i].nombre + "</option>");
                    }
                }
            })
        .fail(function(response) {
            load_provincias_v2();
        });
}

function load_poblaciones_v2(prov) {
    $.get("resources/provinciasypoblaciones.xml", function(xml) {
            $("#poblacion").empty();
            $("#poblacion").append('<option value="" selected="selected">Selecciona una Poblacion</option>');

            $(xml).find('provincia[id=' + prov + ']').each(function() {
                $(this).find('localidad').each(function() {
                    $("#poblacion").append("<option value='" + $(this).text() + "'>" + $(this).text() + "</option>");
                });
            });
        })
        .fail(function() {
            alert("error load_poblaciones");
        });
}

function load_poblaciones_v1(prov) { //provinciasypoblaciones.xml - xpath
    var datos = {
        idPoblac: prov
    };
    $.post("modules/products/controller/controller_products.class.php", datos, function(response) {
            //alert(response);
            var json = JSON.parse(response);
            var poblaciones = json.poblaciones;
            //alert(poblaciones);
            //console.log(poblaciones);
            //alert(poblaciones[0].poblacion);

            $("#poblacion").empty();
            $("#poblacion").append('<option value="" selected="selected">Selecciona una Poblacion</option>');

            if (poblaciones === 'error') {
                load_poblaciones_v2(prov);
            } else {
                for (var i = 0; i < poblaciones.length; i++) {
                    $("#poblacion").append("<option value='" + poblaciones[i].poblacion + "'>" + poblaciones[i].poblacion + "</option>");
                }
            }
        })
        .fail(function() {
            load_poblaciones_v2(prov);
        });
}

//-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_
//Función para Validar Dependent Dropdown

function validate_pais(pais) {
    if (pais === null) {
        //return 'default_pais';
        return false;
    }
    if (pais.length === 0) {
        //return 'default_pais';
        return false;
    }
    if (pais === 'Selecciona un Pais') {
        //return 'default_pais';
        return false;
    }
    return true;
}

function validate_provincia(provincia) {
    if (provincia === null) {
        return 'default_provincia';
    }
    if (provincia.length === 0) {
        return 'default_provincia';
    }
    if (provincia === 'Selecciona una Provincia') {
        //return 'default_provincia';
        return false;
    }
    return true;
}

function validate_poblacion(poblacion) {
    if (poblacion === null) {
        return 'default_poblacion';
    }
    if (poblacion.length === 0) {
        return 'default_poblacion';
    }
    if (poblacion === 'Selecciona una Poblacion') {
        //return 'default_poblacion';
        return false;
    }
    return true;
}


//-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_
//Función para Validar Productos
function validate_products() {

    var result = true; // inicializamos "result"

    //Recogemos todos los valores del formulario para trabajar con el Servidor
    var cod_cuadro = document.getElementById('cod_cuadro').value;
    var nombre_cuadro = document.getElementById('nombre_cuadro').value;
    var precio_cuadro = document.getElementById('precio_cuadro').value;
    var nombre_artista = document.getElementById('nombre_artista').value;
    var fecha_creacion = document.getElementById('fecha_creacion').value;
    var fecha_stock = document.getElementById('fecha_stock').value;
    var dimension_cuadro = document.getElementById('dimension_cuadro').value;
    var tecnica_cuadro = [];
    var inputElements = document.getElementsByClassName('element checkbox');
    var j = 0;
    for (var i = 0; i < inputElements.length; i++) {
        if (inputElements[i].checked) {
            tecnica_cuadro[j] = inputElements[i].value;
            j++;
        }
    }
    var categoria_cuadro = document.getElementById('categoria_cuadro').value;
    var pais = $("#pais").val();
    var provincia = $("#provincia").val();
    var poblacion = $("#poblacion").val();
    var marco_disponible = document.getElementById('marco_disponible').value;
    var material_marco = document.getElementById('material_marco').value;
    var color_marco = document.getElementById('color_marco').value;
    var estilo_marco = document.getElementById('estilo_marco').value;


    //-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-

    //Expresiones Regulares para validar
    var date_reg = /^(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](19|20)\d\d$/;
    //var date_reg = /^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$/;
    var address_reg = /^[a-z0-9- -.]+$/i;
    var pass_reg = /^[0-9a-zA-Z]{6,32}$/;
    var string_reg = /^[A-Za-z]{2,30}$/;
    var usr_reg = /^[0-9a-zA-Z]{2,20}$/;
    var precio = /^[1-9]{3,8}$/; //PATTERN PRECIO
    var codigo = /^[A-Za-z]{3}[0-9]{4}$/; //PATTERN CODIGO = 3 letras + 4 números
    var v_pais = validate_pais(pais);
    var v_provincia = validate_provincia(provincia);
    var v_poblacion = validate_poblacion(poblacion);

    $(".error").remove(); // borramos la clase "error"

    if ($("#cod_cuadro").val() === "" || $("#cod_cuadro").val() == "Introduce codigo producto") {
        $("#cod_cuadro").focus().after("<span class='error'>Introduce codigo producto</span>");
        result = false;
        return false;
    } else if (!codigo.test($("#cod_cuadro").val())) {
        $("#cod_cuadro").focus().after("<span class='error'>Debe tener 3 letras seguidas de 4 números</span>");
        result = false;
        return false;
    } else if ($("#nombre_cuadro").val() === "" || $("#nombre_cuadro").val() == "Introduce nombre del cuadro") {
        $("#nombre_cuadro").focus().after("<span class='error'>Introduce nombre cuadro</span>");
        result = false;
        return false;
    } else if (!string_reg.test($("#nombre_cuadro").val())) {
        $("#nombre_cuadro").focus().after("<span class='error'>Debe tener 2 to 30 letras</span>");
        result = false;
        return false;
    } else if ($("#precio_cuadro").val() === "" || $("#precio_cuadro").val() == "Precio") {
        $("#precio_cuadro").focus().after("<span class='error'>Introduce precio</span>");
        result = false;
        return false;
    } else if (!precio.test($("#precio_cuadro").val())) {
        $("#precio_cuadro").focus().after("<span class='error'>Debe tener entre 3 y 8 cifras</span>");
        result = false;
        return false;
    } else if ($("#fecha_creacion").val() === "" || $("#fecha_creacion").val() == "Introduce fecha creacion") {
        $("#fecha_creacion").focus().after("<span class='error'>Introduce fecha creacion</span>");
        result = false;
        return false;
    } else if (!date_reg.test($("#fecha_creacion").val())) {
        $("#fecha_creacion").focus().after("<span class='error'>Error formato (dd/mm/yyyy)</span>");
        result = false;
        return false;
    } else if ($("#fecha_stock").val() === "" || $("#fecha_stock").val() == "Introduce fecha stock") {
        $("#fecha_stock").focus().after("<span class='error'>Introduce fecha stock</span>");
        result = false;
        return false;
    } else if (!date_reg.test($("#fecha_stock").val())) {
        $("#fecha_stock").focus().after("<span class='error'>Error formato (dd/mm/yyyy)</span>");
        result = false;
        return false;
    } else if (!v_pais) {
        $("#pais").focus().after("<span class='error'>Selecciona un Pais");
        //document.getElementById('e_pais').innerHTML = "Selecciona un Pais";
        result = false;
        return false;
    } else if (!v_provincia) {
        $("#provincia").focus().after("<span class='error'>Selecciona una Provincia");
        //document.getElementById('e_pais').innerHTML = "Selecciona una Provincia";
        result = false;
        return false;
    } else if (!v_poblacion) {
        $("#poblacion").focus().after("<span class='error'>Selecciona una Poblacion");
        //document.getElementById('e_pais').innerHTML = "Selecciona uuna Poblacion";
        result = false;
        return false;
    }


    //Si todo es CORRECTO "result = true", se envian datos al SERVIDOR
    if (result) {

        if (provincia === null) {
            provincia = 'default_provincia';
        } else if (provincia.length === 0) {
            provincia = 'default_provincia';
        } else if (provincia === 'Selecciona una Provincia') {
            return 'default_provincia';
        }

        if (poblacion === null) {
            poblacion = 'default_poblacion';
        } else if (poblacion.length === 0) {
            poblacion = 'default_poblacion';
        } else if (poblacion === 'Selecciona una Poblacion') {
            return 'default_poblacion';
        }

        //Creamos un Array con los datos correctos del formulario.
        var data = {
            "cod_cuadro": cod_cuadro,
            "nombre_cuadro": nombre_cuadro,
            "precio_cuadro": precio_cuadro,
            "nombre_artista": nombre_artista,
            "fecha_creacion": fecha_creacion,
            "fecha_stock": fecha_stock,
            "dimension_cuadro": dimension_cuadro,
            "tecnica_cuadro": tecnica_cuadro,
            "categoria_cuadro": categoria_cuadro,
            "pais": pais,
            "provincia": provincia,
            "poblacion": poblacion,
            "marco_disponible": marco_disponible,
            "material_marco": material_marco,
            "color_marco": color_marco,
            "estilo_marco": estilo_marco
        };

        //Convertimos Array en JSON.
        var data_products_JSON = JSON.stringify(data);

        //Pasamos el JSON al Controller
        $.post('modules/products/controller/controller_products.class.php', {
                discharge_products_json: data_products_JSON
            },

            //utilizamos AJAX para esperar la respuesta "response"
            function(response) {
                //console.log(response);

                if (response.success) {
                    window.location.href = response.redirect;
                }

            }, "json").fail(function(xhr) {

            if (xhr.responseJSON.error.cod_cuadro)
                $("#cod_cuadro").focus().after("<span class='error1'>" + xhr.responseJSON.error.cod_cuadro + "</span>");

            if (xhr.responseJSON.error.nombre_cuadro)
                $("#nombre_cuadro").focus().after("<span class='error1'>" + xhr.responseJSON.error.nombre_cuadro + "</span>");

            if (xhr.responseJSON.error.precio_cuadro)
                $("#precio_cuadro").focus().after("<span class='error1'>" + xhr.responseJSON.error.precio_cuadro + "</span>");

            if (xhr.responseJSON.error.nombre_artista)
                $("#nombre_artista").focus().after("<span class='error1'>" + xhr.responseJSON.error.nombre_artista + "</span>");

            if (xhr.responseJSON.error.fecha_creacion)
                $("#fecha_creacion").focus().after("<span class='error1'>" + xhr.responseJSON.error.fecha_creacion + "</span>");

            if (xhr.responseJSON.error.fecha_stock)
                $("#fecha_stock").focus().after("<span class='error1'>" + xhr.responseJSON.error.fecha_stock + "</span>");

            if (xhr.responseJSON.error.dimension_cuadro)
                $("#dimension_cuadro").focus().after("<span class='error1'>" + xhr.responseJSON.error.dimension_cuadro + "</span>");

            if (xhr.responseJSON.error.tecnica)
                $("#tecnica").focus().after("<span class='error1'>" + xhr.responseJSON.error.tecnica + "</span>");

            if (xhr.responseJSON.error.pais)
                $("#pais").focus().after("<span class='error1'>" + xhr.responseJSON.error.pais + "</span>");

            if (xhr.responseJSON.error.provincia)
                $("#provincia").focus().after("<span class='error1'>" + xhr.responseJSON.error.provincia + "</span>");

            if (xhr.responseJSON.error.poblacion)
                $("#poblacion").focus().after("<span class='error1'>" + xhr.responseJSON.error.poblacion + "</span>");

            if (xhr.responseJSON.error.categoria_cuadro)
                $("#categoria_cuadro").focus().after("<span class='error1'>" + xhr.responseJSON.error.categoria_cuadro + "</span>");

            if (xhr.responseJSON.error.marco_disponible)
                $("#marco_disponible").focus().after("<span class='error1'>" + xhr.responseJSON.error.marco_disponible + "</span>");

            if (xhr.responseJSON.error.material_marco)
                $("#material_marco").focus().after("<span class='error1'>" + xhr.responseJSON.error.material_marco + "</span>");

            if (xhr.responseJSON.error.color_marco)
                $("#color_marco").focus().after("<span class='error1'>" + xhr.responseJSON.error.color_marco + "</span>");

            if (xhr.responseJSON.error.estilo_marco)
                $("#estilo_marco").focus().after("<span class='error1'>" + xhr.responseJSON.error.estilo_marco + "</span>");

            if (xhr.responseJSON.error_avatar)
                $("#dropzone").focus().after("<span class='error1'>" + xhr.responseJSON.error_avatar + "</span>");

            if (xhr.responseJSON.success1) {
                if (xhr.responseJSON.img_avatar !== "/1_bs_multipurpose_Ruma/media/default-avatar.jpg") {
                    //$("#progress").show();
                    //$("#bar").width('100%');
                    //$("#percent").html('100%');
                    //$('.msg').text('').removeClass('msg_error');
                    //$('.msg').text('Success Upload image!!').addClass('msg_ok').animate({ 'right' : '300px' }, 300);
                }
            } else {
                $("#progress").hide();
                $('.msg').text('').removeClass('msg_ok');
                $('.msg').text('Error Upload image!!').addClass('msg_error').animate({
                    'right': '300px'
                }, 300);
            }
        });
    } //

}
