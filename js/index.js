$(document).ready(function () {
    console.log("Esta cargando el .js");
    $("#btn_agregar").click(function () {
        var parametros = "txt_pnombre=" + $("#txt_pnombre").val() +
            "&txt_snombre=" + $("#txt_snombre").val() +
            "&txt_papellido=" + $("#txt_papellido").val() +
            "&txt_sapellido=" + $("#txt_sapellido").val() +
            "&txt_email="       + $("#txt_email").val() +
            "&txt_noIdentidad=" + $("#int_identidad").val() +
            "&txt_direccion=" + $("#txt_direccion").val() +
            "&txt_telefono=" + $("#txt_telefono").val() +
            "&txt_fecha=" + $("#txt_fecha").val();
            
        $.ajax({
            url: "ajax/ingresarPaciente.php?accion=1",
            method: "POST",
            data: parametros,
            success: function (resultado) {
                console.log(resultado);
                console.log(parametros);
            }

        });//ajax
    });//btn crear consulta
});//document