

<div class="row">
					
					  
<?php 
if($tipo2==1){
echo '
    
    
<!-- ./col -->
<div class="col-lg-4 col-xs-6">
<!-- small box -->
<div class="small-box bg-green">
<div class="inner">
<h3>
Entrada y Salida<sup style="font-size: 20px"></sup>
</h3>
<p>
Registrar Ingresos
</p>
</div>
<div class="icon">
<a href="?mod=registroingresos&nuevo" class="small-box-footer"></a>
</div>
<a href="?mod=registroingresos&nuevo" class="small-box-footer">
MAS INFORMACION <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div><!-- ./col -->


<div class="col-lg-4 col-xs-6">
<!-- small box -->
<div class="small-box bg-yellow">
<div class="inner">
<h3>Estadisticas </h3>
<p>
Control Diario
</p>
</div>
<div class="icon">
<a href="?mod=registrokardex&total" class="small-box-footer"></a>
</div>
<a href="?mod=registrokardex&total" class="small-box-footer">
MAS INFORMACION <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div><!-- ./col -->


<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-lg-4 col-xs-6">
<!-- small box -->
<div class="small-box bg-blue">
<div class="inner">
<h3>Administracion</h3>
<p>
administradores y usuarios.                                   </p>
</div>
<div class="icon">
<i class="ion "></i>
</div>
<a href="?mod=registroadmin&lista=lista" class="small-box-footer">
MAS INFORMACION <i class=""></i>
</a>
</div>
</div><!-- ./col -->


</div><!-- /.row -->

';
}

?>

<!-- top row -->

<!-- /.row -->

<!-- START ACCORDION & CAROUSEL-->
                   
                  
                      <div class="col-md-12">
                       
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">lista de ingresos</h3>                                    
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
                                                        
                                                       
                                                         <td><center>
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
                                               echo "    </center>     </td>
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

                    
                        </div><!-- /.col -->
                        
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    
                    </div><!-- /.row -->


