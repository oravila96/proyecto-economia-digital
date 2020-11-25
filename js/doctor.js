$(document).ready(function () {
    console.log("se cargo el .js");
    $("#btn_guardar").click(function () {
        var parametros = 
            "int_identidad="    + $("#int_identidad").val() +
            "&txt_pnombre="     + $("#txt_pnombre").val() +
            "&txt_colegiacion=" + $("#txt_colegiacion").val() +
            "&txt_snombre="     + $("#txt_snombre").val() +
            "&txt_papellido="   + $("#txt_papellido").val() +
            "&txt_sapellido="   + $("#txt_sapellido").val() +
            "&txt_email="       + $("#txt_email").val() +
            "&txt_telefono="    + $("#txt_telefono").val() +
            "&txt_fecha="       + $("#txt_fecha").val() +
            "&txt_direccion="   + $("#txt_direccion").val();
            
        $.ajax({
            url: "ajax/ingresarDoctor.php?accion=3",
            method: "POST",
            data: parametros,
            success: function (resultado) {
                alert(resultado);
            }

        });//ajax
    });//btn crear consulta
});//document