

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
                       
                              <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Fecha</th>
                <th>Patente</th>
                <th>DUS</th>
                <th>K.B.</th>
                <th>Pasajeros</th>
                <th>Funcionario</th>
                
                <th>Tipo Carga</th>
                <th>Tipo</th>
                <th>Cant. Sellos</th>
                <th>Obs. Sellos</th> 
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
                            sellos.cantidad as cantidad,
                            sellos.numero as observacion
                        FROM ingresos 
                            INNER JOIN sellos ON  ingresos.id = sellos.id_ingreso 
                            LEFT JOIN funcionario ON FUNCIONARIO.rut = ingresos.rut";
            $bd->consulta($consulta);
            while ($fila=$bd->mostrar_registros()) {
            
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
                            <td>$fila[observacion]</td>  
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
                <th>Funcionario</th>
                
                <th>Tipo Carga</th>
                <th>Tipo</th>
                <th>Cant. Sellos</th>
                <th>Obs. Sellos</th> 
            </tr>
    </tfoot>
    </table>
    </div><!-- /.box-body --> 

