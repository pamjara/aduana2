            <?php

            require ('validarnum.php');


            $admin=$_SESSION['dondequeda_nombre'];

            $fecha2=date("Y-m-d  H:i:s");  	





            if (isset($_GET['diario'])) { 

            $x1=$_GET['codigo'];

            if (isset($_POST['diario'])) {

            }
            ?>


            <div class="row">
            <div class="col-xs-9">

            <div class="box">
            <div class="box-header">
            <h3 class="box-title">Control Diario</h3>                                    
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                
                <th>Fecha</th>
                
                <th>buscar</th>
                
                <th>Estado</th>

            </tr>
            </thead>
            <tbody>
            <?php
            if($tipo2==1){





            $consulta="SELECT * FROM movimientos INNER JOIN productos ON  movimientos.id_producto_m = productos.id_productos AND datediff(now(),fecha_movimiento)=0 ";


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
                            
                                $fila[descripcion]
                            
                        </td>
                            <td>
                            $fila[modelo]
                        </td>
                        <td> $fila[marca]                                                        </td>
                        <td>
                            $fila[tipo_movimiento]
                        </td>
                            <td>
                            $fila[fecha_movimiento]
                        </td>
                            <td>
                            $fila[cantidadm]
                        </td>
                            <td>

                            $fila[admin]


                        </td>
                        
                            <td>
                            


            $fila[estado]





                    </center>     </td>
                    </tr>";

            }

            } ?>                                            
            </tbody>
            <tfoot>
            <tr>
                    <th>Fecha</th>
                
                <th>buscar</th>
                
                <th>Estado</th>

                
            </tr>
            </tfoot>
            </table>
            </div><!-- /.box-body -->
            </div><!-- /.box -->
            </div>




            


            


            <?php
            }

            if (isset($_GET['total'])) { 

            $x1=$_GET['codigo'];

            if (isset($_POST['total'])) {

            }
            ?>


            <div class="row">
            <div class="col-xs-9">

            <div class="box">
            <div class="box-header">
            <h3 class="box-title">Estadistica  Completo</h3>                                    
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                
                
                
                <th>Fecha</th>
                
                <th>buscar</th>
                
                <th>Estado</th>

            </tr>
            </thead>
            <tbody>
            <?php
            if($tipo2==1){





            $consulta="SELECT * FROM movimientos INNER JOIN productos ON  movimientos.id_producto_m = productos.id_productos ";


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
                            
                                $fila[descripcion]
                            
                        </td>
                            <td>
                            $fila[modelo]
                        </td>
                        <td> $fila[marca]                                                        </td>
                        <td>
                            $fila[tipo_movimiento]
                        </td>
                            <td>
                            $fila[fecha_movimiento]
                        </td>
                            <td>
                            $fila[cantidadm]
                        </td>
                            <td>

                            $fila[admin]


                        </td>
                        
                            <td>
                            


            $fila[estado]





                    </center>     </td>
                    </tr>";

            }

            } ?>                                            
            </tbody>
            <tfoot>
            <tr>
                   <th>Fecha</th>
                
                <th>buscar</th>
                
                <th>Estado</th>

                
            </tr>
            </tfoot>
            </table>
            </div><!-- /.box-body -->
            </div><!-- /.box -->
            </div>




            


            <?php
            }


            ?>









