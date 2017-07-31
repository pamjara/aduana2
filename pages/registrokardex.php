<?php

require ('validarnum.php');

?> 
<div class="col-md-12">
    <div class="box">
        <div class="box-header"><h3 class="box-title">Control Diario</h3></div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="" class="table table-bordered table-striped">


                <thead>
                    <tr><th rowspan="3">N° Día</th><th colspan="4">Camion</th> <th colspan="4">Vehiculo</th><th colspan="4">Peaton</th></tr>
                    <tr><th colspan="2">Ingreso</th> <th colspan="2">Egreso</th><th colspan="2">Ingreso</th> <th colspan="2">Egreso</th><th colspan="2">Ingreso</th> <th colspan="2">Egreso</th></tr>
                    <tr><th>Pasajero</th><th>Kilos</th><th>Pasajero</th><th>Kilos</th><th>Pasajero</th><th>Kilos</th><th>Pasajero</th><th>Kilos</th><th>Pasajero</th><th>Kilos</th><th>Pasajero</th><th>Kilos</th></tr>
    
                </thead>
                <tbody>
        
             <?php
             for($a=1; $a<=31;$a++){
                 echo "<tr>";
                        echo "<td>".$a."</td>";
                        $sql = "SELECT  replace(format( ifnull(SUM(kilos),0),0),',','.')  as kilos, replace(format( ifnull(SUM(kilos),0),0),',','.') as pasajeros FROM ingresos where tipo='Ingreso' AND tipo_carga in ('Zona Austral', 'Imp Chile','Imp Ext','Lastre Chile','Lastre Ext') and fecha ='2017-07-".$a."'";
              
                  
                       $cs =  $bd->consulta($sql);                           
                      if( $bd->numeroFilas($cs) == 0 ){
                    
                     echo "<td>0</td><td>0</td>";
                      }else{
                        while ($fila=$bd->mostrar_registros()) { 
                            echo "<td>".$fila["pasajeros"]."</td><td>".$fila["kilos"]."</td>";
                        }    

                      }
                        //// egresos camion
                       $sql = "SELECT  replace(format( ifnull(SUM(kilos),0),0),',','.')as kilos, ifnull(SUM(pasajeros),0) as pasajeros FROM ingresos where tipo='Egreso' AND tipo_carga in ('Zona Austral', 'Imp Chile','Imp Ext','Lastre Chile','Lastre Ext') and fecha ='2017-07-".$a."'";
              
                  
                       $cs =  $bd->consulta($sql);                           
                      if( $bd->numeroFilas($cs) == 0 ){
                    
                     echo "<td>0</td><td>0</td>";
                      }else{
                        while ($fila=$bd->mostrar_registros()) { 
                            echo "<td>".$fila["pasajeros"]."</td><td>".$fila["kilos"]."</td>";
                        }    

                      }

                      //ingreso vehiculos

                    $sql = "SELECT  replace(format( ifnull(SUM(kilos),0),0),',','.')as kilos, ifnull(SUM(pasajeros),0) as pasajeros FROM ingresos where tipo='Ingreso' AND tipo_carga in ('Transito Int Chile','Transito Int Ext') and fecha ='2017-07-".$a."'";
              
                  
                       $cs =  $bd->consulta($sql);                           
                      if( $bd->numeroFilas($cs) == 0 ){
                    
                     echo "<td>0</td><td>0</td>";
                      }else{
                        while ($fila=$bd->mostrar_registros()) { 
                            echo "<td>".$fila["pasajeros"]."</td><td>".$fila["kilos"]."</td>";
                        }    

                      }

                      //egreso vehicolos

               $sql = "SELECT  replace(format( ifnull(SUM(kilos),0),0),',','.')as kilos, ifnull(SUM(pasajeros),0) as pasajeros FROM ingresos where tipo='Egreso' AND tipo_carga in ('Transito Int Chile','Transito Int Ext') and fecha ='2017-07-".$a."'";
              
                  
                       $cs =  $bd->consulta($sql);                           
                      if( $bd->numeroFilas($cs) == 0 ){
                    
                     echo "<td>0</td><td>0</td>";
                      }else{
                        while ($fila=$bd->mostrar_registros()) { 
                            echo "<td>".$fila["pasajeros"]."</td><td>".$fila["kilos"]."</td>";
                        }    

                      }

                      //ingreso personas

                   $sql = "SELECT  replace(format( ifnull(SUM(kilos),0),0),',','.')as kilos, ifnull(SUM(pasajeros),0) as pasajeros FROM ingresos where tipo='Ingreso' AND tipo_carga in ('A pie','Bicicleta') and fecha ='2017-07-".$a."'";
              
                  
                       $cs =  $bd->consulta($sql);                           
                      if( $bd->numeroFilas($cs) == 0 ){
                    
                     echo "<td>0</td><td>0</td>";
                      }else{
                        while ($fila=$bd->mostrar_registros()) { 
                            echo "<td>".$fila["pasajeros"]."</td><td>".$fila["kilos"]."</td>";
                        }    

                      }


                      //egresos personas

                   $sql = "SELECT  replace(format( ifnull(SUM(kilos),0),0),',','.')as kilos, ifnull(SUM(pasajeros),0) as pasajeros FROM ingresos where tipo='Egreso' AND tipo_carga in ('A pie','Bicicleta') and fecha ='2017-07-".$a."'";
              
                  
                       $cs =  $bd->consulta($sql);                           
                      if( $bd->numeroFilas($cs) == 0 ){
                    
                     echo "<td>0</td><td>0</td>";
                      }else{
                        while ($fila=$bd->mostrar_registros()) { 
                            echo "<td>".$fila["pasajeros"]."</td><td>".$fila["kilos"]."</td>";
                        }    

                      }


                echo "</tr>";
             }

            ?>
            </tbody> 
            <tfoot>
            <?php
                 echo "<tr>";
                        echo "<td> Totales </td>";
                        $sql = "SELECT  replace(format( ifnull(SUM(kilos),0),0),',','.')as kilos, ifnull(SUM(pasajeros),0) as pasajeros FROM ingresos where tipo='Ingreso' AND tipo_carga in ('Zona Austral', 'Imp Chile','Imp Ext','Lastre Chile','Lastre Ext') and fecha between '2017-07-01' and '2017-07-31'";
              
                  
                       $cs =  $bd->consulta($sql);                           
                      if( $bd->numeroFilas($cs) == 0 ){
                    
                     echo "<td>0</td><td>0</td>";
                      }else{
                        while ($fila=$bd->mostrar_registros()) { 
                            echo "<td>".$fila["pasajeros"]."</td><td>".$fila["kilos"]."</td>";
                        }    

                      }
                        //// egresos camion
                                                $sql = "SELECT  replace(format( ifnull(SUM(kilos),0),0),',','.')as kilos, ifnull(SUM(pasajeros),0) as pasajeros FROM ingresos where tipo='Egreso' AND tipo_carga in ('Zona Austral', 'Imp Chile','Imp Ext','Lastre Chile','Lastre Ext') and fecha between '2017-07-01' and '2017-07-31'";
              
                  
                       $cs =  $bd->consulta($sql);                           
                      if( $bd->numeroFilas($cs) == 0 ){
                    
                     echo "<td>0</td><td>0</td>";
                      }else{
                        while ($fila=$bd->mostrar_registros()) { 
                            echo "<td>".$fila["pasajeros"]."</td><td>".$fila["kilos"]."</td>";
                        }    

                      }

                      //ingreso vehiculos

                    $sql = "SELECT  replace(format( ifnull(SUM(kilos),0),0),',','.')as kilos, ifnull(SUM(pasajeros),0) as pasajeros FROM ingresos where tipo='Ingreso' AND tipo_carga in ('Transito Int Chile','Transito Int Ext') and fecha  between '2017-07-01' and '2017-07-31'";
              
                  
                       $cs =  $bd->consulta($sql);                           
                      if( $bd->numeroFilas($cs) == 0 ){
                    
                     echo "<td>0</td><td>0</td>";
                      }else{
                        while ($fila=$bd->mostrar_registros()) { 
                            echo "<td>".$fila["pasajeros"]."</td><td>".$fila["kilos"]."</td>";
                        }    

                      }

                      //egreso vehicolos

               $sql = "SELECT  replace(format( ifnull(SUM(kilos),0),0),',','.')as kilos, ifnull(SUM(pasajeros),0) as pasajeros FROM ingresos where tipo='Egreso' AND tipo_carga in ('Transito Int Chile','Transito Int Ext') and fecha  between '2017-07-01' and '2017-07-31'";
              
                  
                       $cs =  $bd->consulta($sql);                           
                      if( $bd->numeroFilas($cs) == 0 ){
                    
                     echo "<td>0</td><td>0</td>";
                      }else{
                        while ($fila=$bd->mostrar_registros()) { 
                            echo "<td>".$fila["pasajeros"]."</td><td>".$fila["kilos"]."</td>";
                        }    

                      }

                      //ingreso personas

                   $sql = "SELECT  replace(format( ifnull(SUM(kilos),0),0),',','.')as kilos, ifnull(SUM(pasajeros),0) as pasajeros FROM ingresos where tipo='Ingreso' AND tipo_carga in ('A pie','Bicicleta') and fecha  between '2017-07-01' and '2017-07-31'";
              
                  
                       $cs =  $bd->consulta($sql);                           
                      if( $bd->numeroFilas($cs) == 0 ){
                    
                     echo "<td>0</td><td>0</td>";
                      }else{
                        while ($fila=$bd->mostrar_registros()) { 
                            echo "<td>".$fila["pasajeros"]."</td><td>".$fila["kilos"]."</td>";
                        }    

                      }


                      //egresos personas

                   $sql = "SELECT  replace(format( ifnull(SUM(kilos),0),0),',','.')as kilos, ifnull(SUM(pasajeros),0) as pasajeros FROM ingresos where tipo='Egreso' AND tipo_carga in ('A pie','Bicicleta') and fecha  between '2017-07-01' and '2017-07-31'";
              
                  
                       $cs =  $bd->consulta($sql);                           
                      if( $bd->numeroFilas($cs) == 0 ){
                    
                     echo "<td>0</td><td>0</td>";
                      }else{
                        while ($fila=$bd->mostrar_registros()) { 
                            echo "<td>".$fila["pasajeros"]."</td><td>".$fila["kilos"]."</td>";
                        }    

                      }


                echo "</tr>";
            ?>
            </tfoot>
            </table>
            </div><!-- /.box-body -->
            </div><!-- /.box -->
            </div> 
