$(document).ready(function() {
    load_products_ajax();
});

function load_products_ajax() {
    $.ajax({
        type: 'GET',
        url: "modules/products/controller/controller_products.class.php?load=true",
        //dataType: 'json',
        async: false
    }).success(function (data) {
        var json = JSON.parse(data);

        //alert(json.user.usuario);

        list_products(json);

    }).fail(function (xhr) {
        alert(xhr.responseText);
    });
}

////////////////////////////////////////////////////////////////
/*
function load_users_get_v1() {
    $.get("modules/users/controller/controller_users.class.php?load=true", function (data, status) {
        var json = JSON.parse(data);
        //$( "#content" ).html( json.msje );
        //alert("Data: " + json.user.usuario + "\nStatus: " + status);

        list_products(json);
    });
}

////////////////////////////////////////////////////////////////
function load_users_get_v2() {
    var jqxhr = $.get("modules/users/controller/controller_users.class.php?load=true", function (data) {
        var json = JSON.parse(data);
        console.log(json);
        list_products(json);
        //alert( "success" );
    }).done(function () {
        //alert( "second success" );
    }).fail(function () {
        //alert( "error" );
    }).always(function () {
        //alert( "finished" );
    });

    jqxhr.always(function () {
        //alert( "second finished" );
    });
}
*/
/*$(document).ready(function () {
    load_products_ajax();
    //load_users_get_v1();
    //load_users_get_v2();
});*/

function list_products(data) {

    var content = document.getElementById("content");
    var div_user = document.createElement("div");
    var parrafo = document.createElement("p");

    var msje = document.createElement("div");
    msje.innerHTML = "msje = ";
    msje.innerHTML += data.msje;

    var cod_cuadro = document.createElement("div");
    cod_cuadro.innerHTML = "cod_cuadro = ";
    cod_cuadro.innerHTML += data.user.cod_cuadro;

    var nombre_cuadro = document.createElement("div");
    nombre_cuadro.innerHTML = "nombre_cuadro = ";
    nombre_cuadro.innerHTML += data.user.nombre_cuadro;

    var precio_cuadro = document.createElement("div");
    precio_cuadro.innerHTML = "precio_cuadro = ";
    precio_cuadro.innerHTML += data.user.precio_cuadro;

    var nombre_artista = document.createElement("div");
    nombre_artista.innerHTML = "nombre_artista = ";
    nombre_artista.innerHTML += data.user.nombre_artista;

    var fecha_creacion = document.createElement("div");
    fecha_creacion.innerHTML = "fecha_creacion = ";
    fecha_creacion.innerHTML += data.user.fecha_creacion;

    var fecha_stock = document.createElement("div");
    fecha_stock.innerHTML = "fecha_stock = ";
    fecha_stock.innerHTML += data.user.fecha_stock;

    var dimension_cuadro = document.createElement("div");
    dimension_cuadro.innerHTML = "dimension_cuadro = ";
    dimension_cuadro.innerHTML += data.user.dimension_cuadro;

    var tecnica_cuadro = document.createElement("div");
    tecnica_cuadro.innerHTML = "tecnica_cuadro = ";
    for(var i =0;i < data.user.tecnica_cuadro.length;i++){
    tecnica_cuadro.innerHTML += " - "+data.user.tecnica_cuadro[i];
    }

    var categoria_cuadro = document.createElement("div");
    categoria_cuadro.innerHTML = "categoria_cuadro = ";
    categoria_cuadro.innerHTML += data.user.categoria_cuadro;

    var pais = document.createElement("div");
    pais.innerHTML = "pais = ";
    pais.innerHTML += data.user.pais;

    var provincia = document.createElement("div");
    provincia.innerHTML = "provincia = ";
    provincia.innerHTML += data.user.provincia;

    var poblacion = document.createElement("div");
    poblacion.innerHTML = "poblacion = ";
    poblacion.innerHTML += data.user.poblacion;

    var marco_disponible = document.createElement("div");
    marco_disponible.innerHTML = "marco_disponible = ";
    marco_disponible.innerHTML += data.user.marco_disponible;

    var material_marco = document.createElement("div");
    material_marco.innerHTML = "material_marco = ";
    material_marco.innerHTML += data.user.material_marco;

    var color_marco = document.createElement("div");
    color_marco.innerHTML = "color_marco = ";
    color_marco.innerHTML += data.user.color_marco;

    var estilo_marco = document.createElement("div");
    estilo_marco.innerHTML = "estilo_marco = ";
    estilo_marco.innerHTML += data.user.estilo_marco;


    //arreglar ruta IMATGE!!!!!

    var cad = data.user.avatar;
    //console.log('cad');
    //var cad = cad.toLowerCase();
    var img = document.createElement("div");
    var html = '<img src="' + cad + '" height="75" width="75"> ';
    img.innerHTML = html;
    //alert(html);

    div_user.appendChild(parrafo);
    parrafo.appendChild(msje);
    parrafo.appendChild(cod_cuadro);
    parrafo.appendChild(nombre_cuadro);
    parrafo.appendChild(precio_cuadro);
    parrafo.appendChild(nombre_artista);
    parrafo.appendChild(fecha_creacion);
    parrafo.appendChild(fecha_stock);
    parrafo.appendChild(dimension_cuadro);
    parrafo.appendChild(tecnica_cuadro);
    parrafo.appendChild(categoria_cuadro);
    parrafo.appendChild(pais);
    parrafo.appendChild(provincia);
    parrafo.appendChild(poblacion);
    parrafo.appendChild(marco_disponible);
    parrafo.appendChild(material_marco);
    parrafo.appendChild(color_marco);
    parrafo.appendChild(estilo_marco);
    content.appendChild(div_user);
    content.appendChild(img);
}
