<?php 
 include 'inc/config.php';
include 'inc/functionBD.php'; 

$json="";
if (isset($_POST["action"])){
    
    $bd=new GestarBD();

    if(isset($_POST['run']) && $_POST["action"] == "consultaRun") {
        $run  = rutNumerico( $_POST['run'] );
        $sql="select rut, alias, correo, nombre, apellido, nive_usua, ifnull(fono,'') as fono, ifnull(cargo, '') as cargo from funcionario where rut='".$run."'";
        $cs=$bd->consulta($sql);
        if($bd->numeroFilas($cs)>0){
                $json["status"] =false;
                $json["message"] = "Run encontrado, se cargarán los datos";
                $json["data"] = $bd->mostrar_registros();
        }else{
            $json["status"] =true;
        }
    }else if($_POST["action"] == "guardarCliente"){
        $run  = rutNumerico( $_POST['run'] );

        $alias  =  $_POST['alias'];
        $nombre  =  $_POST['nombre'];
        $alias  =  $_POST['apellido']; 
        $alias  =  $_POST['correo'];
        $alias  =  $_POST['fono'];
        $alias  =  $_POST['clave'];
        $alias  =  $_POST['repite'];
        $alias  =  $_POST['cargo'];
        
         
        
        

        $run  = rutNumerico( $_POST['run'] );
        $run  = rutNumerico( $_POST['run'] );
        $run  = rutNumerico( $_POST['run'] );
        $run  = rutNumerico( $_POST['run'] );
        $run  = rutNumerico( $_POST['run'] );
        
        $sql="select rut, alias, correo, nombre, apellido, nive_usua, ifnull(fono,'') as fono, ifnull(cargo, '') as cargo from funcionario where rut='".$run."'";
        $cs=$bd->consulta($sql);
        if($bd->numeroFilas($cs)>0){
                $json["status"] =false;
                $json["message"] = "Run encontrado, se cargarán los datos";
                $json["data"] = $bd->mostrar_registros();
        }else{
            $json["status"] =true;
        }


    }
}else{

    $json["status"] =false;
    $json["message"] = "No ha enviado peticiones validas";
}
header('Content-type: application/json');
echo json_encode( $json ); 


function rutNumerico($rut){
    
    $caracteres = array(".", "-");

    $rut = str_replace($caracteres,"", $rut);

    return  substr ($rut, 0, strlen($rut) - 1);

}

?>