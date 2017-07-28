

<?php

require ('validarnum.php');

$fecha2=date("Y-m-d");  	

if (isset($_GET['nuevo'])) { 

    if (isset($_POST['lugarguardar'])) {
        $rut=strtoupper($_POST["nombre"]);
        
        $nombre=strtoupper($_POST["nombre"]);
        $apellido=strtoupper($_POST["apellido"]);
        $correo=$_POST["correo"];
        $nivel=strtoupper($_POST["nivel"]);
        $pass=$_POST["pw"];      
        $usua=$_POST["usuario"];      

        $sql="select * from funcionario where correo='$correo' or rut='$rut'";

        $cs=$bd->consulta($sql);

        if($bd->numeroFilas($cs)==0){
            $sql2="INSERT INTO `funcionario` (`id`, `usuario`, `pass`, `nombre`, `apellido`, `correo`, `nive_usua`) VALUES (NULL, '$usua', '$pass', '$nombre', '$apellido', '$correo', '$nivel')";
            $cs=$bd->consulta($sql2);

            //echo "Datos Guardados Correctamente";
            echo '<div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Bien!</b>Se registro el Administrador nuevo  Correctamente... 
                    </div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Alerta no se registro este Administrador</b> Ya Existe... 
                </div>';
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
        <form role="form"  name="fe" action="?mod=registroadmin&nuevo=nuevo" method="post">
            <div class="box-body">
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="run">Run</label>
                        <input required  type="text"  type="tex" name="run" class="form-control" value="<?php echo $var2 ?>" id="run" placeholder="Intoducir el R.U.N">
                    </div>  
                    <div class="col-md-5">
                        <label for="alias">Alias</label>
                        <input required onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" name="alias" id="alias" class="form-control" value="<?php echo $var2 ?>"  placeholder="Intoducir el Alias">
                    </div>  
                    <div class="col-md-3">
                        <label for="nivel">Nivel De Usuario</label>

                        <select required class="form-control" name='nivel' id='nivel'>
                            <option  value="1">Administrador</option>
                            <option value="2">Usuario Invitado</option>
                        </select>
                    </div>  

                    <div class="col-md-6">
                        <label for="nombre">Nombre</label>
                        <input required onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $var2 ?>"  placeholder="Intoducir el Nombre">
                    </div>  
                    <div class="col-md-6">
                        <label for="apellido">Apellido</label>
                        <input required onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="tex" name="apellido" id="apellido" class="form-control" value="<?php echo $var3 ?>" placeholder="Apellido">
                    </div> 
                    
                    <div class="col-md-4">
                        <label for="correo">E-mail</label>
                        <input  required type="email" name="correo" id="correo" class="form-control" value="<?php echo $var4 ?>"  placeholder="Correo">
                    </div>
                    <div class="col-md-4">
                        <label for="clave">Clave</label>
                        <input   required type="password" name="clave" class="form-control" value="<?php echo $var3 ?>" id="clave" placeholder="Contraseña">
                    </div>
                    <div class="col-md-4">
                        <label for="repite">Repita</label>
                        <input   required type="password" name="repite" id="repite" class="form-control" value="<?php echo $var3 ?>" placeholder="Contraseña">
                    </div>
                    
                    <div class="col-md-4">
                        <label for="cargo">Cargo</label>
                        <input required onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" name="cargo" id="cargo" class="form-control" value="<?php echo $var2 ?>"  placeholder="Intoducir el Nombre">
                    </div>  
                    <div class="col-md-3">
                        <label for="fono">Fono</label>
                        <input required type="phone" name="fono" id="fono" class="form-control" value="<?php echo $var3 ?>" placeholder="Apellido">
                    </div> 
                
                    <div>
                        <label for="guardar"> &nbsp;&nbsp; </label><br>
                    
                        <button type="submit" class="btn btn-primary" name="guardar" id="guardar" value="Guardar"><i class="fa fa-save"></i> Agregar</button>
                
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

                        $consulta="SELECT  rut, alias, correo, nombre, apellido, nive_usua, fono, cargo FROM funcionario ORDER BY rut ASC ";
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
                                        <a href=?mod=registroadmin&editar&codigo=".$fila["id"].">
                                            <img src='./img/consul.png' width='25' alt='Edicion' title=' CONSULTAR ".$fila["nombre"]."'>
                                        </a>
                                        <a href=?mod=registroadmin&editar&codigo=".$fila["id"].">
                                            <img src='./img/editar.png' width='25' alt='Edicion' title='EDITAR LOS DATOS DE ".$fila["nombre"]."'>
                                        </a> 
                                        <a href=?mod=registroadmin&eliminar&codigo=".$fila["id"].">
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



<?php


}




}
?>
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
