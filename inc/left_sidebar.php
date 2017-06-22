    <div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
    <div class="pull-left image">
    <img src="img/avatar3.png" class="img-circle" alt="User Image" />
    </div>
    <div class="pull-left info">
    <p>Hola, <?php echo $_SESSION['dondequeda_nombre']; ?></p>

    <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
    </div>
    </div>
    <!-- search form 
    <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
    <input type="text" name="q" class="form-control" placeholder="Buscar..."/>
    <span class="input-group-btn">
    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
    </span>
    </div>
    </form>-->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
    <li class="active">
    <a href="?mod=index" data-ajax="false">
    <i class="fa fa-home"></i> <span>Principal</span>
    </a>
    </li>



    <li class="treeview">
    <li><a href="?mod=registroingresos&nuevo"><i class=" glyphicon glyphicon-floppy-open"></i>Entrada y Salida</a> </li>
    <ul class="treeview-menu">
    <?php 
    { ?>

    <?php } ?>



    <?php 
    if($tipo2==1){ ?>




    <?php } ?>
    </ul>
    </li>

    



    <li class="treeview">
    <a href="#">
    <i class="glyphicon glyphicon-calendar"></i>
    <span>Estadisticas</span>
    <i class="fa  fa fa-unsorted "></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="?mod=registrokardex&diario"><i class=" fa fa-sort-amount-desc"></i>Estadisticas Diario </a> </li>
    



    </ul>
    </li>

    <?php 
    if($tipo2==1){ ?>



    <?php
    if($tipo2==1){

    ?>
    <li class="treeview">
    <a href="#">
    <i class="fa fa-gears"></i>
    <span>Administracion </span>
    <i class="fa  fa fa-unsorted"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="?mod=registroadmin&nuevo"><i class="glyphicon glyphicon-user"></i>Registrar Administrador</a> </li>
    <li><a href="?mod=registroadmin&lista=lista"><i class="glyphicon glyphicon-list-alt"></i>Lista De Administradores</a> </li>

   
    <li><a href="?mod=/respaldo/respaldo&respaldo=respaldo"><i class=" glyphicon glyphicon-hdd"></i>Respaldar Bd</a> </li>

    </ul>
    </li>




    <?php 

    }
    } ?>

    </section>
    <!-- /.sidebar -->
    </aside>
