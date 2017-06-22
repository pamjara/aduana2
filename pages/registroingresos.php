<?php
 
require ('validarnum.php');

$fecha2=date("Y-m-d");  	

     if (isset($_GET['nuevo'])) { 
     if (isset($_POST['nuevo'])) {
                           

$numIngresos=strtoupper($_POST["numIngresos"]);
$fechaIngresos=strtoupper($_POST["fechaIngresos"]);
$patenteIngresos=$_POST["patenteIngresos"];
$dusIngresos=strtoupper($_POST["dusIngresos"]);
$kbingresos=$_POST["kbingresos"];  
$pasajeroIngresos=$_POST["pasajeroIngresos"];      
$estadoIngresos=strtoupper($_POST["estadoIngresos"]);
$cantIngresos=strtoupper($_POST["cantIngresos"]);
$ingresoSellos=strtoupper($_POST["ingresoSellos"]);


$sql="select * from ingresos where dusIngresos='$dusIngresos' AND fechaIngresos='$fechaIngresos' AND estadoIngresos='$estadoIngresos'AND numIngresos='$numIngresos' AND patenteIngresos='$patenteIngresos' 
AND kbingresos='$kbingresos' AND pasajeroIngresos='$pasajeroIngresos' AND cantIngresos='$cantIngresos' AND ingresoSellos='$ingresoSellos'";

$cs=$bd->consulta($sql);

if($bd->numeroFilas($cs)==0){

$sql2="INSERT INTO `ingresos` ( `dusIngresos`, `fechaIngresos`, `patenteIngresos`, `numIngresos`, `kbingresos`, `pasajeroIngresos`, `estadoIngresos`, `cantIngresos`,`ingresoSellos` ) 
VALUES ( '$dusIngresos', '$fechaIngresos', '$patenteIngresos', '$numIngresos', '$kbingresos', '$pasajeroIngresos', '$estadoIngresos','0', '$ingresoSellos')";

$cs=$bd->consulta($sql2);
//echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b>Se registro   Correctamente... ';

                            echo '   </div>';

}else{

//CONSULTAR SI EL CAMPO YA EXISTE
	                        echo '<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alerta no se registro </b> Ya Existe... ';

                            echo '   </div>';
}

}
?>
<br>
<br>
  <div class="col-md-12">
  <!-- general form elements -->
  <div class="box box-primary">
  <div class="box-header">
  <h3 class="box-title">Ingreso Aduana Chile</h3>
 </div>

<!-- form start -->
<form role="form"  name="fe" action="?mod=registroingresos&nuevo=nuevo" method="post">
<div class="box-body"><div class="form-group">
                                           
<div class="col-md-4 ">
<label for="exampleInputFile">N° Registro</label>
<input onkeydown="return enteros(this, event)" required type="text" name="numIngresos" class="form-control" value="<?php echo $var1 ?>" id="exampleInputEmail1" placeholder="Número">
</div>                                           
<div class="col-md-4 ">
<label for="exampleInputFile">Fecha</label>
<input   required type="date" name="fechaIngresos" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" >
</div>
<div class="col-md-4 ">
<label for="exampleInputFile">Patente</label>
<input    required type="tex" name="patenteIngresos" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="patente">
</div>
<br>
<br>
<div class="col-md-4 ">
<label for="exampleInputFile">DUS</label>
<input onkeydown="return enteros(this, event)" type="text" required type="tex" name="dusIngresos" class="form-control" value="<?php echo $var2 ?>" id="exampleInputEmail1" placeholder="DUS">
</div>
<div class="col-md-4 ">
<label for="exampleInputFile">K.B.</label>
<input onkeydown="return enteros(this, event)" required type="text" name="kbingresos" class="form-control" value="<?php echo $var1 ?>" id="exampleInputEmail1" placeholder="K.B.">
</div>
<div class="col-md-4 ">
<label for="exampleInputFile">Pasajeros</label>
<input onkeydown="return enteros(this, event)" type="text" name="pasajeroIngresos" class="form-control" value="<?php echo $var1 ?>" id="exampleInputEmail1" placeholder="Números Pasajeros">
</div> 
<br>
<br>
<br>                                           
<div class="col-md-4 ">
<label for="exampleInputFile">Tipo carga</label>
<select  for="exampleInputEmail" class="form-control" name='estadoIngresos'>
                    <option  value="Zona Austral">Zona Austral</option>
                    <option value="Imp Chile">Imp Chile</option>
                    <option value="Imp Ext">Imp Ext</option>
                    <option value="Lastre Chile">Lastre Chile</option>
                    <option value="Lastre Ext">Lastre Ext</option>
                    <option value="Transito Int Chile">Transito Int Chile</option>
                    <option value="Transito Int Ext">Transito Int Ext</option>
                    <option value="A pie">A pie</option>
                    <option value="Bicicleta">Bicicleta</option>
</select>
</div>
</div><!-- /.box-body -->

<br>
<div class="container">
  
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg"   data-toggle="modal" data-target="#myModal">Sellos</button>
            


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="col-md-12">
<!-- general form elements -->
<div class="box box-primary">
<div class="box-header">
<h3 class="box-title">Registrar Sellos</h3>
<br><br>

<?php                 
$sql="INSERT INTO sellos ( id_sellos, numRegSellos, numSellos, cantidadSellos,nuloSellos)
VALUES
( '$id_sellos', '$numRegSellos', '$numSellos', '$cantidadSellos','$nuloSellos')  ";
$bd->consulta($sql);
?>

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
</div>
</div>
<center>
<div class="box-footer">
<input type=submit  class="btn btn-primary btn-lg" name="nuevo" id="nuevo" value="Guardar">
</div>
</center>
</div>
<br>
<br>
            

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
</div>
</div>
</div>
</div>
</div>
  
   
 <!-- fin Modal -->  
 </div>

<center>
<div class="box-footer">
<button type="submit" class="btn btn-primary btn-lg" name="nuevo" id="nuevo" value="Guardar">Guardar</button>
</div>
</center>
</form>
</div><!-- /.box -->

<br>
<br> 
                            
<div class="row">
<div class="col-xs-12">
                            
<div class="box">
<div class="box-header">
<?php 
if($tipo2==1){
    echo '
    <div class="box-header">
    </form>
    </div>
    </div>
    </div>  '; 
} ?>
</br>       
<div class="col-md-2">
<div class="box">
<div class="box-header">
<center>
<div class="box-header">
                                    
</div>
<a target='_blank'  href=./pdf/listaingresos.php><img src='./img/impresora.png'  width='40' alt='Edicion' title='Imprimir '></a>
</center>
</div>
</div>
</div>
<br>
<h3 class="box-title">Lista de Ingresos:</h3>

                                    
</div><!-- /.box-header -->
<div class="box-body table-responsive">
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
if($tipo2==1){

$consulta="SELECT * FROM ingresos INNER JOIN sellos ON ingresos.ingresoSellos = sellos.id_sellos";


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
                              <td>
                                  $fila[numRegistro]
                              </td>
                              <td>
                                  $fila[fechaIngresos]
                              </td>
                              <td> 
                                  $fila[patenteIngresos]                                                     
                              </td>
                              <td>
                                  $fila[dusIngresos]
                              </td>
                              <td>
                                  $fila[kbingresos]
                              </td>
                              <td>
                                  $fila[pasajerosIngresos]
                              </td>
                              <td>
                                  $fila[estadoIngresos]
                              </td>
                              <td>
                                  $fila[cantidadSellos]
                              </td>
                               <td>
                                  $fila[numSellos]
                              </td>
                              <td>
                                  $fila[nuloSellos]
                              </td>

                             <td>
                             <center>
                              ";
      
                              echo"
            <a  href=?mod=registroingresos&consultar&codigo=".$fila["id_ingresos"]."><img src='./img/consultarr.png' width='25' alt='Edicion' title='VER LOS DATOS DE ".$fila["estadoIngresos"]."'></a> ";
            if($tipo2==1){
                              echo "
      
            <a  href=?mod=registroingresos&editar&codigo=".$fila["id_ingresos"]."><img src='./img/editar.png' width='25' alt='Edicion' title='EDITAR LOS DATOS DE ".$fila["estadoIngresos"]."'></a> 
            <a   href=?mod=registroingresos&eliminar&codigo=".$fila["id_ingresos"]."><img src='./img/elimina2.png'  width='25' alt='Edicion' title='ELIMINAR A   ".$fila["estadoIngresos"]."'></a>
                               ";
                               }
                               }
                                echo "   
                                </center>    
                                </td>
                          </tr>";
} ?>                                            
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
</div><!-- /.box -->
</div>
                    
              
<?php
}
if (isset($_GET['editar'])) { 

//codigo que viene de la lista
$x1=$_GET['codigo'];
if (isset($_POST['editar'])) {
                           


$numSellos=strtoupper($_POST["numSellos"]);
$fechaIngresos=strtoupper($_POST["fechaIngresos"]);
$patenteIngresos=$_POST["patenteIngresos"];
$dusIngresos=strtoupper($_POST["dusIngresos"]);
$kbingresos=$_POST["kbingresos"];      
$pasajeroIngresos=$_POST["pasajeroIngresos"];      
$estadoIngresos=strtoupper($_POST["estadoIngresos"]);



                       
if( $numSellos=="" )
                {
                
                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                    
                }
        else
           {



$sql22=" UPDATE ingresos SET 
ingresoSellos='$ingresoSellos' ,
fechaIngresos='$fechaIngresos' ,
patenteIngresos='$patenteIngresos' ,
dusIngresos='$dusIngresos' ,
kbingresos='$kbingresos', 
pasajeroIngresos='$pasajeroIngresos',
estadoIngresos='$estadoIngresos'  
 where id_productos='$x1'";


$bd->consulta($sql22);
   
//echo "Datos Guardados Correctamente";
echo '<div class="alert alert-success alert-dismissable">
<i class="fa fa-check"></i>
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<b>Bien!</b> Datos Editados Correctamente... ';



echo '   </div>';
                           
}
   
}


                                        
     $consulta="SELECT numIngresos, fechaIngresos, patenteIngresos,dusIngresos,kbingresos,pasajerosIngresos, estadoIngresos, ingresoSellos FROM ingresos where id_ingresos='$x1'";
     $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) {



?>
  <div class="col-md-10">
<!-- general form elements -->
<div class="box box-primary">
<div class="box-header">
<h3 class="box-title">Editar Ingresos </h3>
</div>

                            
<?php  echo '  <form role="form"  name="fe" action="?mod=registroingresos&editar=editar&codigo='.$x1.'" method="post">';
?>
<div class="box-body">
<div class="form-group">




<label for="exampleInputFile">N° Sellos</label>
<input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="numSellos" class="form-control" value="<?php echo $fila['numSellos'] ?>" id="exampleInputEmail1" placeholder="0000">
<label for="exampleInputFile">Fecha</label>
<input   required type="date" name="fechaIngresos" class="form-control" value="<?php echo $fila['fechaIngresos'] ?>" id="exampleInputEmail1" >

<label for="exampleInputFile">Patente</label>
<input    required type="tex" name="patenteIngresos" class="form-control" value="<?php echo $fila['patenteIngresos'] ?>" id="exampleInputEmail1" placeholder="0000">

<label for="exampleInputFile">DUS</label>
<input onkeydown="return enteros(this, event)" required type="text" name="dusIngresos" class="form-control" value="<?php echo $fila['dusIngresos'] ?>" id="exampleInputEmail1" placeholder="0000">

<label for="exampleInputFile">K.B.</label>
<input onkeydown="return enteros(this, event)" required type="text" name="kbingresos" class="form-control" value="<?php echo $fila['kbingresos'] ?>" id="exampleInputEmail1" placeholder="0000">

<label for="exampleInputFile">Pasajeros</label>
<input onkeydown="return enteros(this, event)" required type="text" name="pasajerosIngresos" class="form-control" value="<?php echo $fila['pasajerosIngresos'] ?>" id="exampleInputEmail1" placeholder="0000">

<label for="exampleInputFile">Tipo Carga</label>


<select  for="exampleInputEmail" class="form-control" name='estadoIngresos'>
                    <option  value="Zona Austral">Zona Austral</option>
                    <option value="Imp Chile">Imp Chile</option>
                    <option value="Imp Ext">Imp Ext</option>
                    <option value="Lastre Chile">Lastre Chile</option>
                    <option value="Lastre Ext">Lastre Ext</option>
                    <option value="Transito Int Chile">Transito Int Chile</option>
                    <option value="Transito Int Ext">Transito Int Ext</option>
                    <option value="A pie">A pie</option>
                    <option value="Bicicleta">Bicicleta</option>

</select>
</div>
</div><!-- /.box-body -->

<div class="box-footer">
<button type="submit" class="btn btn-primary btn-lg" name="editar" id="editar" value="Editar">Editar</button>


</div>
</form>
</div><!-- /.box -->
<?php


}
}

 //eliminar
if (isset($_GET['eliminar'])) { 

//codigo que viene de la lista
$x1=$_GET['codigo'];
if (isset($_POST['eliminar'])) {
                           


$nombre=strtoupper($_POST["nombre"]);
$apellido=strtoupper($_POST["apellido"]);
$correo=strtoupper($_POST["correo"]);
$ci=strtoupper($_POST["ci"]);

                       
    if( $x1=="" )
    {

    echo "
    <script> alert('error')</script>
    ";
    echo "<br>";

    }
    else
    {


$sql="delete from ingresos where id_ingresos='$x1' ";

$bd->consulta($sql);
                          


            //echo "Datos Guardados Correctamente";
            echo '<div class="alert alert-success alert-dismissable">
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <b>Bien!</b> Se Elimino Correctamente... ';

            echo '   </div>';

            echo '
            <div class="col-md-3">
            <div class="box">
            <div class="box-header">
            <div class="box-header">
            <h3> <center>Regresar a Lista<a href="registroingresos.php" class="alert-link"></a></center></h3>                                    
            </div>
            <center>        
            <form  name="fe" action="?mod=registroingresos&lista" method="post" id="ContactForm">



 <input title="REGRESAR A LISTA" name="btn1"  class="btn btn-primary"type="submit" value="Regresar a lista">

    
  </form>
  </center>
</div>
</div>
</div>  ';         



}
   
}


                                
$consulta="SELECT numIngresos, fechaIngresos, patenteIngresos,dusIngresos,kbingresos,pasajerosIngresos, estadoIngresos, ingresoSellos  FROM ingresos where id_ingresos='$x1'";
$bd->consulta($consulta);
while ($fila=$bd->mostrar_registros()) {



?>
<center>
  <div class="col-md-5">
                <!-- general form elements -->
                <div class="box box-primary">
                <div class="box-header">
                <h3 class="box-title">Eliminar Ingreso</h3>
                </div>

                            
                <?php  echo '  <form role="form"  name="fe" action="?mod=registroingresos&eliminar=eliminar&codigo='.$x1.'" method="post">';
                ?>
                <div class="box-body">
                <div class="form-group">

                <center>
                <table id="example1" class="table table-bordered table-striped">
            <tr>
                   <td>
                      <h3> N° Sellos</h3>
                   </td>   
                   <td> 
                       <?php echo $fila['numSellos'] ?>
                   </td>
            </tr>
            <tr>
                   <td>
                      <h3> N° Registro</h3>
                   </td>   
                   <td> 
                       <?php echo $fila['numIngresos'] ?>
                   </td>
            </tr>
            <tr>
                   <td>
                       <h3>Fecha </h3>
                   </td>
                   <td>
                      <?php echo $fila['fechaIngresos'] ?>
                   </td>
            </tr>
            <tr>
                  <td>
                       <h3>Patente</h3>
                 </td>
                  <td>
                       <?php echo $fila['patenteIngresos'] ?>
                 </td>
            </tr>
             <tr>
                  <td>
                       <h3>DUS</h3>
                  </td>
                  <td>
                       <?php echo $fila['dusIngresos'] ?>
                  </td>
             </tr>
             <tr> 
                   <td>
                      <h3>K.B.</h3>
                  </td>
                  <td>
                      <?php echo $fila['kbingresos'] ?>
                  </td>
            </tr>
             <tr>
                  <td>
                       <h3>Pasajeros</h3></td><td>
                       <?php echo  $fila['pasajeroIngresos'] ?>
                  </td>
            </tr> 
            <tr>   
                   <td>
                       <h3>Tipo Carga</h3>
                   </td>
                   <td>
                        <?php echo  $fila['estadoIngresos'] ?>
                   </td>
            </tr>

    </table>
    </center>
    </div>



</div><!-- /.box-body -->

<div class="box-footer">
<input type=submit  class="btn btn-primary btn-lg" name="eliminar" id="eliminar" value="ELIMINAR">




</div>
</form>
</div><!-- /.box -->
</center>



<?php

echo '
<div class="col-md-3">
<div class="box">
<div class="box-header">
<div class="box-header">
<h3> <center>Regresar a Lista<a href="#" class="alert-link"></a></center></h3>                                    
</div>
<center>        
<form  name="fe" action="?mod=registroingresos&lista" method="post" id="ContactForm">



<input title="REGRESAR A LISTA" name="btn1"  class="btn btn-primary"type="submit" value="Regresar a lista">


</form>
</center>
</div>
</div>
</div>  ';  ?>


<?php


}

}

if (isset($_GET['consultar'])) { 

//codigo que viene de la lista
$x1=$_GET['codigo'];
if (isset($_POST['consultar'])) {



}



$consulta="SELECT numIngresos, fechaIngresos, patenteIngresos,dusIngresos,kbingresos,pasajerosIngresos, estadoIngresos, ingresoSellos FROM ingresos where id_ingresos='$x1'";
$bd->consulta($consulta);
while ($fila=$bd->mostrar_registros()) {



?>
<center>
  <div class="col-md-5">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Consulta de Equipo</h3>
                                </div>
                                
                
    <?php  echo '  <form role="form"  name="fe" action="?mod=registroingresos&eliminar=eliminar&codigo='.$x1.'" method="post">';
    ?>
    <div class="box-body">
    <div class="form-group">

    <center>
    <table id="example1" class="table table-bordered table-striped">
            <tr>
                   <td>
                      <h3> N° Sellos</h3>
                   </td>   
                   <td> 
                       <?php echo $fila['numSellos'] ?>
                   </td>
            </tr>
            <tr>
                   <td>
                      <h3> N° Registro</h3>
                   </td>   
                   <td> 
                       <?php echo $fila['numIngresos'] ?>
                   </td>
            </tr>
            <tr>
                   <td>
                       <h3>Fecha </h3>
                   </td>
                   <td>
                      <?php echo $fila['fechaIngresos'] ?>
                   </td>
            </tr>
            <tr>
                  <td>
                       <h3>Patente</h3>
                 </td>
                  <td>
                       <?php echo $fila['patenteIngresos'] ?>
                 </td>
            </tr>
             <tr>
                  <td>
                       <h3>DUS</h3>
                  </td>
                  <td>
                       <?php echo $fila['dusIngresos'] ?>
                  </td>
             </tr>
             <tr> 
                   <td>
                      <h3>K.B.</h3>
                  </td>
                  <td>
                      <?php echo $fila['kbingresos'] ?>
                  </td>
            </tr>
             <tr>
                  <td>
                       <h3>Pasajeros</h3></td><td>
                       <?php echo  $fila['pasajeroIngresos'] ?>
                  </td>
            </tr> 
            <tr>   
                   <td>
                       <h3>Tipo Carga</h3>
                   </td>
                   <td>
                        <?php echo  $fila['estadoIngresos'] ?>
                   </td>
            </tr>

                                               
    </table>

    </center>
    </div>
    </div><!-- /.box-body -->

    </form>
    </div><!-- /.box -->
    </center>



<?php



                                echo '
        <div class="col-md-3">
        <div class="box">
        <div class="box-header">
        <div class="box-header">
        <h3> <center>Regresar a Lista<a href="#" class="alert-link"></a></center></h3>                                    
        </div>
        <center>        
        <form  name="fe" action="?mod=registroingresos&lista" method="post" id="ContactForm">



        <input title="REGRESAR A LISTA" name="btn1"  class="btn btn-primary"type="submit" value="Regresar a lista">


        </form>
        </center>
        </div>
        </div>
        </div>  ';  ?>
                            
    
<?php


}




}
?>



<?php








?>
