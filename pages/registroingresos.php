

<?php

require ('validarnum.php');
 
$id="";
$dus="";
$fecha="";   
$patente="";
$kilos="";
$pasajeros=""; 
$tipo="";   
$tipo_carga="";
     
$idsello="";
$numerosello="";
$cantidadsello="";


$readonly="";



             

if (isset($_POST['submitAction'])) {
    if($_POST["submitAction"]=="guardar" || $_POST["submitAction"] == "editar"){
   
    if( isset($_POST["fecha"])  || isset($_POST["patente"])  || isset($_POST["dus"]) || 
        isset($_POST["kb"])  || isset($_POST["pasajero"])  || isset($_POST["tipo_carga"]) || 
        isset($_POST["tipo"])   ){
             
            $dus=$_POST["dus"];
            $fecha=$_POST["fecha"];
            $patente=$_POST["patente"];
            $kilos=$_POST["kb"];
            $pasajeros=$_POST["pasajero"];
            $tipo=$_POST["tipo"];  
            $tipo_carga=$_POST["tipo_carga"];

                $sql2="select *   from ingresos where id='".$_POST["numIngresos"]."'";
            $rut=$_SESSION['dondequeda_id'];

                $cs=$bd->consulta($sql2);
            if($bd->numeroFilas($cs)==0){
                
                if($_POST["submitAction"]=="guardar"){
                    
                    $sql2="INSERT INTO `ingresos` (dus, fecha, patente, kilos, pasajeros, rut, tipo, tipo_carga)
                            values
                            ('$dus', '$fecha', '$patente', '$kilos', '$pasajeros', '$rut', '$tipo', '$tipo_carga')";

                    echo '<div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Bien!</b>Se registro el '.$tipo.' nuevo  Correctamente... 
                        </div>';
                $cs=$bd->consulta($sql2);


$id_registro="";
                    $result = $bd->consulta("select max(id) as id from ingresos");
                    while($fila=$bd->mostrar_registros()){
              $id_registro= $fila["id"];
                    }   

                                  $sql_sellos = "INSERT INTO SELLOS (numero, cantidad, id_ingreso) values ('".$_POST['sellos']."', '".$_POST['cantidad']."','".$id_registro."')";
                   
                        $bd->consulta($sql_sellos);    
                }
            }
            if($_POST["submitAction"]=="editar"){
             
                    $sql2="UPDATE ingresos SET dus='$dus', fecha='$fecha', patente='$patente', kilos='$kilos', pasajeros='$pasajeros', tipo='$tipo', tipo_carga='$tipo_carga' WHERE id=".$_POST['numIngresos'];
                          echo '<div class="alert alert-success alert-dismissable">
                                    <i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Bien!</b>Se edito el $tipo  Correctamente... 
                                </div>';
                    $cs=$bd->consulta($sql2);
                    $sql_sellos="UPDATE SELLOS SET numero='".$_POST['sellos']."', cantidad='".$_POST['cantidad']."' WHERE id_ingreso=".$_POST['numIngresos'];
       
                        $bd->consulta($sql_sellos);
                        
                } 

$dus="";
$fecha="";   
$patente="";
$kilos="";
$pasajeros=""; 
$tipo="";   
$tipo_carga="";
     
$idsello="";
$numerosello="";
$cantidadsello="";   
                    $readonly=""; 

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
                    $bd->consulta("DELETE FROM SELLOS WHERE id_ingreso='".$_POST["submitAction"]."'");
                            
                    $sql2="DELETE FROM ingresos WHere id='".$_POST["submitAction"]."'";
                    $cs=$bd->consulta($sql2);
        
    }
    } 

if( isset($_GET["mod"])){
    $action =$_GET["mod"];
    $codigo =$_GET["codigo"];
     

    $sql="select * from ingresos where id='$codigo'";
   
    $cs=$bd->consulta($sql);

    if($bd->numeroFilas($cs)==0 && isset($_GET["action"])){
        //echo "Datos Guardados Correctamente";
        echo '<div class="alert alert-danger alert-dismissable">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Bien!</b>No existe el ingreso consulado... 
                </div>';
    }else{

            while ($fila=$bd->mostrar_registros()) {
                    $id=$fila["id"];
                    $dus=$fila["dus"];
                    $fecha=$fila["fecha"];
                    $patente=$fila["patente"];
                    $kilos=$fila["kilos"];
                    $pasajeros=$fila["pasajeros"];
                    $tipo=$fila["tipo"];  
                    $tipo_carga=$fila["tipo_carga"];
            }

                $sql="select * from sellos where id_ingreso='$codigo'";
   
             $cs=$bd->consulta($sql);

            while ($fila=$bd->mostrar_registros()) {
                    $cantidadsello=$fila["cantidad"];
                    $numerosello=$fila["numero"];  
            }
            if($_GET["action"]){
            echo '<div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Se listó ingreso / egreso</b> correctamente... 
                    </div>';

            }

            if($_GET["action"]== "ver"){
        
                    $readonly="disabled";
            } else if($_GET["action"] == "eliminar"){ 
                    $readonly="readonly";

            }else if($_GET["action"] == "editar"){ 
                    $readonly=""; 
            }
        } 
    }

if($id==""){

    $sql="select (max(id)+ 1 ) as id from ingresos";
   
     $bd->consulta($sql);
        while ($fila=$bd->mostrar_registros()) {
            $id=$fila["id"];
        }
}


?>
<div class="box box-primary">

<div class="col-md-12">
        <div class="box-header">
            <h3 class="box-title">Ingreso Aduana Chile</h3>
        </div>

<!-- form start -->
        <form role="form"  name="fe" action="?mod=registroingresos&nuevo=nuevo" method="post">
            <div class="box-body">
                <div class="form-group">
                    <div class="col-md-4 ">
                        <input  type="hidden" name="numIngresos" value="<?php echo $id ?>">
                    
                        <label for="numIngresos">N° Registro</label>
                        <input disabled onkeydown="return enteros(this, event)" required type="text" name="numIngresos" class="form-control" value="<?php echo $id ?>" id="numIngresos" placeholder="Número">
                    </div>                                           
                    <div class="col-md-4 ">
                        <label for="fecha">Fecha</label>
                        <input <?php echo $readonly;?>   required type="date" name="fecha" class="form-control" value="<?php echo $fecha ?>" id="fecha" >
                    </div>
                    <div class="col-md-4 ">
                        <label for="patente">Patente</label>
                        <input <?php echo $readonly;?>    required type="tex" name="patente" class="form-control" value="<?php echo $patente ?>" id="patente" placeholder="Patente">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4 ">
                        <label for="dus">DUS</label>
                        <input <?php echo $readonly;?> onkeydown="return enteros(this, event)" type="text" required name="dus" class="form-control" value="<?php echo $dus ?>" id="dus" placeholder="DUS">
                    </div>
                    <div class="col-md-4 ">
                        <label for="kb">K.B.</label>
                        <input <?php echo $readonly;?> onkeydown="return enteros(this, event)" required type="text" name="kb" class="form-control" value="<?php echo $kilos ?>" id="kb" placeholder="K.B.">
                    </div>
                    <div class="col-md-4 ">
                        <label for="pasajero">Pasajeros</label>
                        <input <?php echo $readonly;?> onkeydown="return enteros(this, event)" type="text" name="pasajero" class="form-control" value="<?php echo $pasajeros ?>" id="pasajero" placeholder="Números Pasajeros">
                    </div> 
                </div>   
                <div class="form-group">                                       
                    <div class="col-md-4 ">
                        <label for="tipo_carga">Tipo carga</label>
                        <select  <?php echo $readonly;?> class="form-control" name='tipo_carga' id='tipo_carga'>
                        <?php 
                        $austral = "";
                        $impChile = "";
                        $impExt = "";
                        $lasChile = "";
                        $lasExt = "";
                        $traChile = "";
                        $traExt = "";
                        $pie = "";
                        $bici = "";
                        
                        if($tipo_carga=="Zona Austral"){
                            $austral ="selected";
                        }else if($tipo_carga=="Imp Chile"){
                            $impChile ="selected";
                        }else if($tipo_carga=="Imp Ext"){   
                            $impExt ="selected";
                        }else if($tipo_carga=="Lastre Chile"){   
                            $lasChile ="selected";
                        }else if($tipo_carga=="Lastre Ext"){   
                            $lasExt ="selected";
                        }else if($tipo_carga=="Transito Int Chile"){  
                            $traChile ="selected";
                         }else if($tipo_carga=="Transito Int Ext"){  
                            $traExt ="selected";
                          }else if($tipo_carga=="A pie"){   
                            $pie ="selected";
                          }else if($tipo_carga=="Bicicleta"){   
                            $bici ="selected";
                          } 
                        ?>
                            <option <?php echo $austral;?>  value="Zona Austral">Zona Austral</option>
                            <option <?php echo $impChile;?> value="Imp Chile">Imp Chile</option>
                            <option <?php echo $impExt;?> value="Imp Ext">Imp Ext</option>
                            <option <?php echo $lasChile;?> value="Lastre Chile">Lastre Chile</option>
                            <option <?php echo $lasExt;?> value="Lastre Ext">Lastre Ext</option>
                            <option <?php echo $traChile;?> value="Transito Int Chile">Transito Int Chile</option>
                            <option <?php echo $traExt;?> value="Transito Int Ext">Transito Int Ext</option>
                            <option <?php echo $pie;?> value="A pie">A pie</option>
                            <option <?php echo $bici;?> value="Bicicleta">Bicicleta</option>
                        </select>
                    </div>
                    <div class="col-md-2 ">
                        <label for="tipo">Ingreso/Egreso</label>
                        <select  <?php echo $readonly;?> class="form-control" name='tipo' id='tipo'>
                            <option  value="Ingreso">Ingreso</option>
                            <option value="Egreso">Egreso</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="cantidad">Cantidad</label>
                        <input <?php echo $readonly;?> onkeydown="return enteros(this, event)" type="text" name="cantidad" class="form-control" value="<?php echo $cantidadsello ?>" id="cantidad" placeholder="Cantidad Sellos">
                    </div>
                 <div class="col-md-4">
                        <label for="cantidad">Sellos</label>
                        <textarea <?php echo $readonly;?> row="7" cols="20"  name="sellos" class="form-control" id="sellos" placeholder="descripcion de sellos"><?php echo $numerosello ?></textarea>
                    </div> 
                    <div class="col-md-4">
                    <br>
                    <a href="?mod=registroingresos" class="btn btn-default"><i class="fa fa-eraser"></i> Limpiar</a>
                    <?php
                    if($_GET["action"]== "ver"){ 

                    } else if($_GET["action"] == "eliminar"){
                    ?>
                        <button type="submit" class="btn btn-danger" name="guardar"  value="Eliminar"><i class="fa fa-trash"></i> Eliminar</button>
                    <input type="hidden" name="submitAction" value="<?php echo $id;?>">
                    
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
            </div><!-- /.box-body --> 
        </form>
    </div> 
</div>
<!-- Modal -->
<div class="col-md-12">
    <h3 class="box-title">
    <span style="width:750px"> Lista de Ingresos:</span>
        <a target='_blank'  href=./pdf/listaingresos.php><img src='./img/impresora.png'  width='40' alt='Edicion' title='Imprimir '></a>
        
    </h3> 
 
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Fecha</th>
                <th>Patente</th>
                <th>DUS</th>
                <th>K.B.</th>
                <th>Pasajeros</th>
                <th>Tipo Carga</th>
                <th>Cant</th>
                <th>Sellos</th>
                <th>Sellos Nulo</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $consulta="SELECT 
                            ingresos.id as id, 
                            ingresos.fecha, patente, dus, kilos, pasajeros, 
                            funcionario.alias as funcionario,
                            tipo_carga,
                            tipo ,
                            sellos.cantidad as cantidad
                        FROM ingresos 
                            INNER JOIN sellos ON 
                            ingresos.id = sellos.id_ingreso 
                            LEFT JOIN funcionario ON FUNCIONARIO.rut = ingresos.rut";
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
    echo "<tr>
                <td>$fila[id]</td>
                <td>$fila[fecha]</td>
                <td>$fila[patente]</td>
                <td>$fila[dus]</td>
                <td>$fila[kilos] </td>
                <td>$fila[pasajeros]</td>
                <td>$fila[funcionario]</td>
                <td>$fila[tipo_carga]</td> 
                <td>$fila[tipo]</td> 
                <td>$fila[cantidad]</td> 
                
                <td> 
                    <a  href=?mod=registroingresos&action=ver&codigo=".$fila["id"].">
                        <img src='./img/consultarr.png' width='25' alt='Edicion' title='VER LOS DATOS DE ".$fila["id"]."'>
                    </a> 
                    <a  href=?mod=registroingresos&action=editar&codigo=".$fila["id"].">
                        <img src='./img/editar.png' width='25' alt='Edicion' title='EDITAR LOS DATOS DE ".$fila["id"]."'>
                    </a> 
                    <a   href=?mod=registroingresos&action=eliminar&codigo=".$fila["id"].">
                        <img src='./img/elimina2.png'  width='25' alt='Edicion' title='ELIMINAR A   ".$fila["id"]."'>
                    </a>
                </td>
            </tr>";
    } 
    ?>                                            
    </tbody>
    <tfoot>
            <tr>
                <th>Nº</th>
                <th>Fecha</th>
                <th>Patente</th>
                <th>DUS</th>
                <th>K.B.</th>
                <th>Pasajeros</th>
                <th>Tipo Carga</th>
                <th>Cant</th>
                <th>Sellos</th>
                <th>Sellos Nulo</th>
                <th>Opciones</th>
            </tr>
    </tfoot>
    </table>
    </div><!-- /.box-body --> 
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            
                <h3 class="box-title">Registrar Sellos</h3>
            </div>  
                    <!-- general form elements -->
            <div class="box-body">
                <div class="form-group">
                    <div class="col-md-6 ">
                        <label for="exampleInputFile">Numero Registro</label>
                        <input  required type="text" name="numRegSellos" class="form-control" value="" id="exampleInputEmail1" placeholder="00000">
                    </div>
                    <div class="col-md-6 ">
                        <label for="exampleInputFile">Número Sello</label>
                        <input  required type="text" name="numSellos" class="form-control" value="" id="exampleInputEmail1" placeholder="0000">
                    </div>
                    <div class="col-md-6 ">
                        <label for="exampleInputFile">Cantidad </label>
                        <input  required type="text" name="cantidadSellos" class="form-control" value="" id="exampleInputEmail1" placeholder="0000">
                    </div>
                    <div class="col-md-6 ">
                        <label for="exampleInputFile">Sello Nulo</label>
                        <input  required type="text" name="nuloSellos" class="form-control" value="" id="exampleInputEmail1" placeholder="0000">
                    </div>
                </div>
            </div>
            <div class="box-footer">
            <br><br>
                <input type=submit  class="btn btn-primary" name="nuevo" id="nuevo" value="Guardar">
            </div>
        </div>  
    </div> 
</div>  
 