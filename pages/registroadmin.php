

<?php

require ('validarnum.php');

$fecha2=date("Y-m-d");  	
$rut="";
$alias="";
$usua="";   
$nombre="";
$apellido="";
$correo="";
$cargo="";
$fono="";   
$clave="";
$repite="";     
$readonly="";


function digitoVerificador($_rol) {
    /* Bonus: remuevo los ceros del comienzo. */
    while($_rol[0] == "0") {
        $_rol = substr($_rol, 1);
    }
    $factor = 2;
    $suma = 0;
    for($i = strlen($_rol) - 1; $i >= 0; $i--) {
        $suma += $factor * $_rol[$i];
        $factor = $factor % 7 == 0 ? 2 : $factor + 1;
    }
    $dv = 11 - $suma % 11;
    /* Por alguna razón me daba que 11 % 11 = 11. Esto lo resuelve. */
    $dv = $dv == 11 ? 0 : ($dv == 10 ? "K" : $dv);
    return number_format($_rol,0,",","."). "-" . $dv;
}

function rutNumerico($rut){
    
    $caracteres = array(".", "-");

    $rut = str_replace($caracteres,"", $rut);

    return  substr ($rut, 0, strlen($rut) - 1);

}
    if (isset($_POST['submitAction'])) {


    if($_POST["submitAction"]=="guardar" || $_POST["submitAction"] == "editar"){
   
    if( isset($_POST["run"])  || isset($_POST["alias"])  || isset($_POST["nivel"]) || 
        isset($_POST["nivel"])  || isset($_POST["nombre"])  || isset($_POST["apellido"]) || 
        isset($_POST["correo"])  || isset($_POST["cargo"])  || isset($_POST["fono"]) ||
        isset($_POST["clave"])  || isset($_POST["repite"])  ){
            
            $rut=strtoupper($_POST["run"]);
            $alias=strtoupper($_POST["alias"]);
            $usua=strtoupper($_POST["nivel"]);   
            $nombre=strtoupper($_POST["nombre"]);
            $apellido=strtoupper($_POST["apellido"]);
            $correo=strtoupper($_POST["correo"]);
            $cargo=strtoupper($_POST["cargo"]);
            $fono=strtoupper($_POST["fono"]);  
            $clave=strtoupper($_POST["clave"]);   
            
            
            if( $_POST["clave"]  == $_POST["repite"]){
                
                    $sql="select * from funcionario where correo='$correo' or rut='".rutNumerico($rut)."'";

                    $cs=$bd->consulta($sql);

                    if($bd->numeroFilas($cs)==0){
                        
                       if($_POST["submitAction"]=="guardar"){
                           
                        $sql2="INSERT INTO `funcionario` (`rut`, `alias`, `pass`, `nombre`, `apellido`, `correo`, `nive_usua`, fono, cargo) VALUES (".rutNumerico($rut).", '$alias', '$pass', '$nombre', '$apellido', '$correo', '$usua', '$fono','$cargo')";
                 
                            echo '<div class="alert alert-success alert-dismissable">
                                <i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b>Bien!</b>Se registro el funcionario nuevo  Correctamente... 
                                </div>';
                        $cs=$bd->consulta($sql2);
                                    
                       }
                    }else{
                        $sql2="UPDATE `funcionario` set `alias`='$alias', `pass`='$clave', `nombre`='$nombre', `apellido`='$apellido', `correo`='$correo', `nive_usua`='$usua', fono='$fono', cargo='$cargo' where rut='".rutNumerico($rut)."'";
                        //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                <i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b>Bien!</b>Se edito el funcionario  Correctamente... 
                                </div>';
                        $cs=$bd->consulta($sql2);
                                
                       }

                    $rut="";
                    $alias="";
                    $usua="";   
                    $nombre="";
                    $apellido="";
                    $correo="";
                    $cargo="";
                    $fono="";   
                    $clave="";
                    $repite="";     
                    $readonly="";

                }else{
                        echo '<div class="alert alert-danger alert-dismissable">
                                <i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b>Alerta no se registro este funcionario</b> Ya Existe... 
                            </div>';
                    }


            }else{
             echo '<div class="alert alert-danger alert-dismissable">
                                <i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b>No concuerda las claves ingresadas</b> No son iguales... 
                            </div>';


            }


    

    }else{
                  echo '<div class="alert alert-success alert-dismissable">
                                <i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b>Se eliminó el funcionario </b> Correctamente... 
                            </div>';
        $sql2="DELETE FROM `funcionario` WHere rut='".rutNumerico($_POST["submitAction"])."'";
        $cs=$bd->consulta($sql2);
        
    }
    } 

if( isset($_GET["mod"])){
    $action =$_GET["mod"];
    $codigo =$_GET["codigo"];
     

    $sql="select * from funcionario where rut='$codigo'";

        $cs=$bd->consulta($sql);

        if($bd->numeroFilas($cs)==0 && isset($_GET["action"])){
            //echo "Datos Guardados Correctamente";
            echo '<div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Bien!</b>No existe el Funcioanario consulado... 
                    </div>';
            }else{
    
                    while ($fila=$bd->mostrar_registros()) {
                            $rut=  $fila["rut"];
                            $alias=strtoupper($fila["alias"]);
                            $usua= strtoupper($fila["nive_usua"]);   
                            $nombre= strtoupper($fila["nombre"]);
                            $apellido=strtoupper($fila["apellido"]);
                            $correo=strtoupper($fila["correo"]);
                            $cargo=strtoupper($fila["cargo"]);
                            $fono=$fila["fono"];  
                            $clave=$fila["pass"];  
                            $repite=$fila["pass"];  
                            
                    }
           
                if($_GET["action"]== "ver"){
                                echo '<div class="alert alert-success alert-dismissable">
                                            <i class="fa fa-check"></i>
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <b>Funcionario listado</b> correctamente... 
                                        </div>';
                        $readonly="disabled";

                } else if($_GET["action"] == "eliminar"){
                                 echo '<div class="alert alert-success alert-dismissable">
                                            <i class="fa fa-check"></i>
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <b>Funcionario listado</b> ... 
                                        </div>';
                        $readonly="readonly";



                }else if($_GET["action"] == "editar"){
                                 echo '<div class="alert alert-success alert-dismissable">
                                            <i class="fa fa-check"></i>
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <b>Funcionario listado</b> modifique información ... 
                                        </div>';
                        $readonly="";



                }
            }



}

?>

<div class="col-md-10">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Registrar Administradores</h3>
        </div>


        <!-- form start -->
        <form role="form"  name="fe" action="?mod=registroadmin" method="post">
            <div class="box-body">
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="run">Run</label>
                        <?php
                             if($rut==""){
                                 $rut="";
                                 } 
                                 else {
                            $rut =  digitoVerificador($rut);
                        }
                        
                        ?>
                        <input required  <?php echo $readonly;?> type="text"  type="tex" name="run" class="form-control" value="<?php echo $rut; ?>" id="run" placeholder="Intoducir el R.U.N">
                    </div>  
                    <div class="col-md-5">
                        <label for="alias">Alias</label>
                        <input required <?php echo $readonly;?> onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" name="alias" id="alias" class="form-control" value="<?php echo $alias ?>"  placeholder="Intoducir el Alias">
                    </div>  
                    <div class="col-md-3">
                        <label for="nivel">Nivel De Usuario</label>
                        <?php
                        $selectAdministrador="selected";
                        $selectFuncionario="";

                        if( $usua == "2" ){
                            $selectAdministrador="";
                            $selectFuncionario="selected";
                        }
                        ?>
                        <select required class="form-control" name='nivel' id='nivel' <?php echo $readonly;?>>
                            <option  value="1" <?php echo $selectAdministrador; ?>>Administrador</option>
                            <option value="2" <?php echo $selectFuncionario; ?>>Funcionario</option>
                        </select>
                    </div>  

                    <div class="col-md-6">
                        <label for="nombre">Nombre</label>
                        <input required <?php echo $readonly;?> onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $nombre ?>"  placeholder="Intoducir el Nombre">
                    </div>  
                    <div class="col-md-6">
                        <label for="apellido">Apellido</label>
                        <input required <?php echo $readonly;?> onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="tex" name="apellido" id="apellido" class="form-control" value="<?php echo $apellido ?>" placeholder="Introducir Apellido">
                    </div> 
                    
                    <div class="col-md-4">
                        <label for="correo">E-mail</label>
                        <input  required <?php echo $readonly;?> type="email" name="correo" id="correo" class="form-control" value="<?php echo $correo ?>"  placeholder="Correo">
                    </div>
                    <div class="col-md-4">
                        <label for="clave">Clave</label>
                        <input   required <?php echo $readonly;?> type="password" name="clave" class="form-control" value="<?php echo $clave ?>" id="clave" placeholder="Contraseña">
                    </div>
                    <div class="col-md-4">
                        <label for="repite">Repita</label>
                        <input   required <?php echo $readonly;?> type="password" name="repite" id="repite" class="form-control" value="<?php echo $repite ?>" placeholder="Contraseña">
                    </div>
                    
                    <div class="col-md-4">
                        <label for="cargo">Cargo</label>
                        <input required <?php echo $readonly;?> onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" name="cargo" id="cargo" class="form-control" value="<?php echo $cargo ?>"  placeholder="Intoducir  Cargo">
                    </div>  
                    <div class="col-md-3">
                        <label for="fono">Fono</label>
                        <input required <?php echo $readonly;?> type="phone" name="fono" id="fono" class="form-control" value="<?php echo $fono ?>" placeholder="Fono">
                    </div> 
                
                    <div> 
                        <label for="guardar"> &nbsp;&nbsp; </label><br>
                        <a href="?mod=registroadmin" class="btn btn-default"><i class="fa fa-eraser"></i> Limpiar</a>
                    <?php
                    if($_GET["action"]== "ver"){ 

                    } else if($_GET["action"] == "eliminar"){
                    ?>
                        <button type="submit" class="btn btn-danger" name="guardar"  value="Eliminar"><i class="fa fa-trash"></i> Eliminar</button>
                    <input type="hidden" name="submitAction" value="<?php echo $rut;?>">
                    
                    <?php


                    }   else if($_GET["action"] == "editar"){
                    ?>
                    <input type="hidden" name="submitAction" value="editar">
                    
                        <button type="submit" class="btn btn-primary" name="guardar" value="Editar"><i class="fa fa-pencil"></i> Editar</button>
                    
                    <?php


                    }else{


                    ?>
                    <input type="hidden" name="submitAction" value="guardar">
                    
                        <button type="submit" class="btn btn-primary" name="guardar" value="Guardar"><i class="fa fa-save"></i> Agregar</button>

                    <?php
                }
                    ?>

                
                    </div>

                </div>
            </div> 
        </form>
    </div><!-- /.box -->


<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Administradores y Usuarios:</h3>                                    
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>correo</th>
                            <th>Nivel</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($tipo2==1){

                        $consulta="SELECT  rut, alias, correo, nombre, apellido, case nive_usua when 1 then 'Administrador' else 'Funcionario' end as nive_usua, fono, cargo FROM funcionario ORDER BY rut ASC ";
                        $bd->consulta($consulta);
                        while ($fila=$bd->mostrar_registros()) {
                                switch ($fila['status']) {
                                case 1:
                                $btn_st = "danger";
                                $txtFuncion = "Desactivar";
                                break;

                                case 0:
                                $btn_st = "primary";
                                $txtFuncion = "Activar";
                                break;
                                }
                                //echo '<li data-icon="delete"><a href="?mod=lugares?edit='.$fila['id_tipo'].'"><img src="images/lugares/'.$fila['imagen'].'" height="350" >'.$fila['nombre'].'</a><a href="?mod=lugares?borrar='.$fila['id_tipo'].'" data-position-to="window" >Borrar</a></li>';
                                echo "<tr>
                                <td>$fila[nombre]</td>
                                <td> $fila[apellido] </td>
                                <td>$fila[correo]</td>
                                <td>$fila[nive_usua]</td>
                                <td>
                                    <center>
                                        <a href=?mod=registroadmin&action=ver&codigo=".$fila["rut"].">
                                            <img src='./img/consul.png' width='25' alt='Edicion' title=' CONSULTAR ".$fila["nombre"]."'>
                                        </a>
                                        <a href=?mod=registroadmin&action=editar&codigo=".$fila["rut"].">
                                            <img src='./img/editar.png' width='25' alt='Edicion' title='EDITAR LOS DATOS DE ".$fila["nombre"]."'>
                                        </a> 
                                        <a href=?mod=registroadmin&action=eliminar&codigo=".$fila["rut"].">
                                            <img src='./img/elimina.png'  width='25' alt='Edicion' title='ELIMINAR A   ".$fila["nombre"]."'>
                                        </a>
                                    </center>
                                </td>
                                </tr>";

                                }
                            } 
                        ?>                                            
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Nivel</th>
                            <th>Acción</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>



 
<script  type="text/javascript" src="js/jquery-1.2.min.js"></script>

<script  type="text/javascript">
 jquery1_5 = jQuery.noConflict( );
</script>
<script  type="text/javascript" src="js/jquery.rut.js"></script>
<script  type="text/javascript">
   $(document).ready(function(){
        

        jquery1_5('#run').Rut({
                on_error: function(){
                jquery1_5('#run').focus();
                jquery1_5('#run').select();
        },
        on_success: function(){
          $.ajax({
                method: "POST",
                url: "ajax.php",
                data: { run: $("#run").val() , action:"consultaRun"}
                })
                .done(function( data ) {
                   if(data.status == false){
                       alert(data["data"].alias);
                     $("#alias").val(data["data"].alias);
                     $("#nombre").val(data["nombre"].alias);
                     $("#apellido").val(data["apellido"].alias);
                     $("#fono").val(data["fono"].alias);
                     $("#cargo").val(data["cargo"].alias);
                     $("#alias").val(data["correo"].alias);
                     $("#alias").val(data["data"].alias);

                   }
                });
        } ,
        format_on: 'keyup'
        });

    });
</script>
