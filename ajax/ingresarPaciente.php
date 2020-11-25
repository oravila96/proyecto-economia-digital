<?php
    include ('../conect.php');
    mb_internal_encoding("UTF-8");
    switch ($_GET["accion"]) {
        case '1':
            if(isset($_POST["txt_pnombre"])){
                $pnombre = $_POST["txt_pnombre"];
            }
            if(isset($_POST["txt_snombre"])){
                $snombre = $_POST["txt_snombre"];
            }
            if(isset($_POST["txt_noIdentidad"])){
                $identidad = $_POST["txt_noIdentidad"];
            }
            if(isset($_POST["txt_papellido"])){
                $papellido = $_POST["txt_papellido"];
            }
            if(isset($_POST["txt_sapellido"])){
                $sapellido = $_POST["txt_sapellido"];
            }
            if(isset($_POST["txt_email"])){
                $email = $_POST["txt_email"];
            }
            if(isset($_POST["txt_direccion"])){
                $direccion = $_POST["txt_direccion"];
            }
            if(isset($_POST["txt_telefono"])){
                $telefono = $_POST["txt_telefono"];
            }            
            if(isset($_POST["txt_fecha"])){
                $fecha = $_POST["txt_fecha"];
            }
            if($fecha=="" || $fecha==NULL){
                echo "Ingrese la fecha de nacimiento";
            }
            if($pnombre=="" || $pnombre==NULL){
                echo "Ingrese el primer nombre";
            }
            if($snombre=="" || $snombre==NULL){
                echo "Ingrese el segundo nombre";
            }
            if($papellido=="" || $papellido==NULL){
                echo "Ingrese el primer apellido";
            }
            if($sapellido=="" || $sapellido==NULL){
                echo "Ingrese el segundo apellido";
            }
            if($identidad=="" || $identidad==NULL){
                echo "Ingrese la identidad";
            }            
            if($direccion=="" || $direccion==NULL){
                echo "Ingrese la direccion";
            }
            if($email=="" || $email==NULL){
                echo "Ingrese el correo";
            }
            if($telefono=="" || $telefono==NULL){
                echo "Ingrese el numero telefonico";
          _  }
                $unir=oci_parse($conn,'DECLARE
                                            pbError NUMBER;
                                            pcMensaje VARCHAR2(1000);
                                        BEGIN
                                            SP_AGREGARPACIENTE(:p1, :p2, :p3, :p4, :p5, :p6, :p7, :p8, :p9, :p10, :p11);
                                        END;');
                oci_bind_by_name($unir, ':p1', $pnombre);
                oci_bind_by_name($unir, ':p2', $snombre);
                oci_bind_by_name($unir, ':p3', $papellido);
                oci_bind_by_name($unir, ':p4', $sapellido);
                oci_bind_by_name($unir, ':p5', $email);
                oci_bind_by_name($unir, ':p6', $direccion);
                oci_bind_by_name($unir, ':p7', $identidad);
                oci_bind_by_name($unir, ':p8', $telefono);
                oci_bind_by_name($unir, ':p9', $fecha);
                oci_bind_by_name($unir, ':p10', $codigoError, 40);
                oci_bind_by_name($unir, ':p11', $mensajeError, 40);
                oci_execute($unir);
                if(!isset($unir)){
                    echo 'Ha ocurrido un error';
                }
                else{
                    while($fila = oci_fetch_array($unir, OCI_ASSOC)){
                        echo $fila["PBERROR"];
                        echo $fila["PCMENSAJE"];
                    }
                    echo 'Codigo'.$codigoError.' Mensaje '.$mensajeError;
                    
                }
                oci_free_statement($unir);
                oci_close($conn);

            /*PARA VISTAS O PARA IMPRIMIR VARAIOS REGISTROS
            $sql='SELECT pnombre, papellido FROM PERSONA';
                $unir=oci_parse($conn,$sql);
                $respuesta=oci_execute($unir);
                if(!isset($unir)){
                    echo 'Ha ocurrido un error';
                }
                else{
                    while($fila = oci_fetch_array($unir, OCI_ASSOC)){
                        echo $fila["PNOMBRE"];
                        echo $fila["PAPELLIDO"];
                    }
                    
                }
                oci_free_statement($unir);
                oci_close($conn);
                */
        break;
    }



    /*if (isset($_POST['Agregar'])) {
            $idEmpleado=$_POST['idEmpleado'];
            $idPersona=$_POST['idPersona'];
            $fechaIngreso=$_POST['fechaIngreso'];

            $cnn=oci_connect($user,$pswrd);
                $sql="INSERT INTO Empleado VALUES('$idEmpleado','$idPersona','$fechaIngreso')";
                $unir=oci_parse($cnn,$sql);
                oci_execute($unir);
                echo "DATOS INSERTADOS";
        }
        */
?>