<?php
require("../obtain/userdata.php");
if(empty($_SESSION['usuario']))
{
  header('Location: ../../index.php');
}
require("../obtain/contadores.php");
require("../obtain/events.php");
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Spa PC | 2019</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../../assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="blue" data-background-color="black" data-image="../../assets/img/sidebar-1.jpg">

            <div class="logo">
                <a href="#" class="simple-text">
                    SPAPC
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="#" class="simple-text">
                    SPA
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="../../assets/img/faces/avatar.png" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            Roberto Romero
                            <b class="caret"></b>
                        </a>
                    </div>
                </div>
                <ul class="nav">
                    <li>
                        <a href="dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="active">
                        <a data-toggle="collapse" href="#equiposdivs">
                            <i class="material-icons">computer</i>
                            <p>Servicios
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="equiposdivs">
                            <ul class="nav">
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#modalEquipo">Nuevo</a>
                                </li>
                                <li  class="active">
                                    <a href="lista_equipos.php">Lista</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#recibosdiv">
                            <i class="material-icons">attach_money</i>
                            <p>Recibos
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="recibosdiv">
                            <ul class="nav">
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#modalRecibo">Nuevo</a>
                                </li>
                                <li>
                                    <a href="lista_recibos.php">Lista</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#cotizacionesdiv">
                            <i class="material-icons">border_color</i>
                            <p>Cotizaciones
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="cotizacionesdiv">
                            <ul class="nav">
                                <li>
                                    <a href="cotizacion.php">Nuevo</a>
                                </li>
                                <li>
                                    <a href="lista_cotizaciones.php">Lista</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#clientesdiv">
                            <i class="material-icons">account_box</i>
                            <p>Clientes
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="clientesdiv">
                            <ul class="nav">
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#modalCliente">Nuevo</a>
                                </li>
                                <li>
                                    <a href="lista_clientes.php">Lista</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#usuariosdiv">
                            <i class="material-icons">account_circle</i>
                            <p>Usuarios
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="usuariosdiv">
                            <ul class="nav">
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#modalUsuario">Nuevo</a>
                                </li>
                                <li>
                                    <a href="lista_usuarios.php">Lista</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="comercializacion.php">
                            <i class="material-icons">attach_money</i>
                            <p>Comercialización</p>
                        </a>
                    </li>
                    <li>
                        <a href="estadisticas.php">
                            <i class="material-icons">dashboard</i>
                            <p>Estadisticas</p>
                        </a>
                    </li>
                    <li>
                        <a href="tkpos.php">
                            <i class="material-icons">web</i>
                            <p>TKPOS</p>
                        </a>
                    </li>
                    <li>
                        <a href="logs.php">
                            <i class="material-icons">ballot</i>
                            <p>Logs</p>
                        </a>
                    </li>
                    <li>
                        <a href="empresas_user.php">
                            <i class="material-icons">perm_identity</i>
                            <p>Usuarios Empresas</p>
                        </a>
                    </li>
                    <li>
                        <a href="solicitud_reportes.php">
                            <i class="material-icons">report_problem</i>
                            <p>Solicitudes Reportes</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Dashboard </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">

                            <li>
                                <a href="../validations/close.php">
                                    <i class="material-icons">cancel</i>
                                </a>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group form-search is-empty">
                                <input type="text" class="form-control" placeholder="Buscar">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <select id="tiposervicios" class="form-control">
                                <option>Equipos</option>
                                <option>Servicios</option>
                                <option>Comercializaciones</option>
                            </select>
                            <div class="card" id="lequipos">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Lista de Equipos
                                    </select></h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="disabled-sorting">O.S.</th>
                                                    <th class="disabled-sorting">Ingreso</th>
                                                    <th class="disabled-sorting">Equipo</th>
                                                    <th class="disabled-sorting">Marca</th>
                                                    <th class="disabled-sorting">Modelo</th>
                                                    <th class="disabled-sorting">Serie</th>
                                                    <th class="disabled-sorting">Problema</th>
                                                    <th class="disabled-sorting">Observaciones</th>
                                                    <th class="disabled-sorting">Diagnostico</th>
                                                    <th class="disabled-sorting">Estado</th>
                                                    <th class="disabled-sorting text-right">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php require_once("../obtain/equipos.php");?>
                                           </tbody>
                                       </table>
                                   </div>
                               </div>
                           </div>
                           <div class="card" id="lservicios" style="display: none;">
                            <div class="card-header card-header-icon" data-background-color="purple">
                                <i class="material-icons">assignment</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Lista de Servicios</h4>
                                <div class="toolbar">
                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                </div>
                                <div class="material-datatables">
                                    <table id="datatables2" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="disabled-sorting">O.S.E</th>
                                                <th class="disabled-sorting">Empresa</th>
                                                <th class="disabled-sorting">Fecha programada</th>
                                                <th class="disabled-sorting">Hora Programada</th>
                                                <th class="disabled-sorting">Problema</th>
                                                <th class="disabled-sorting">Solucion</th>
                                                <th class="disabled-sorting">Observaciones</th>
                                                <th class="disabled-sorting">Asignado</th>
                                                <th class="disabled-sorting">Estado</th>
                                                <th class="disabled-sorting text-right">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php require_once("../obtain/servicios.php");?>
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
                       <div class="card" id="lcomercializaciones" style="display: none;">
                        <div class="card-header card-header-icon" data-background-color="purple">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Lista de Comercializaciones</h4>
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="material-datatables">
                                <table id="datatables3" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="disabled-sorting">O.C</th>
                                            <th class="disabled-sorting">Empresa</th>
                                            <th class="disabled-sorting">Servicio</th>
                                            <th class="disabled-sorting">Fecha de Solicitud</th>
                                            <th class="disabled-sorting">Fecha de Visita</th>
                                            <th class="disabled-sorting">Interesado</th>
                                            <th class="disabled-sorting">Razón</th>
                                            <th class="disabled-sorting">Tiempo real</th>
                                            <th class="disabled-sorting">Duración Real</th>
                                            <th class="disabled-sorting text-right">Notas</th>
                                            <th class="disabled-sorting text-right">Asignado</th>
                                            <th class="disabled-sorting text-right">Operaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php require_once("../obtain/comercializaciones.php");?>
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <footer class="footer">
    <div class="container-fluid">
        <p class="copyright pull-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>
            <a href="#">Servicios, Programas y Accesorios </a>
        </p>
    </div>
</footer>
</div>
</div>  
<!-- Modal Agregar Equipo-->
<div class="modal fade" id="modalEquipo" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar:</h4>
          <select id="tipo_servicio" class="form-control">
            <option selected disabled="">Seleccione</option>
            <option value="0">Equipo electronico</option>
            <option value="1">Atención a empresa</option>
        </select>
    </div>
    <div class="modal-body" id="equipos_add" style="display: none;">
      <form class="form-horizontal" action="../request/add_equipo.php" method = "POST">
        <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group label-floating ">
                                    <label class="control-label" >Articulo:</label>
                                    <input type="text" class="form-control" id="equipo"  name="equipo">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating ">
                                    <label class="control-label" >Marca:</label>
                                    <input type="text" class="form-control" id="marca"  name="marca">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating ">
                                    <label class="control-label" >Modelo:</label>
                                    <input type="text" class="form-control" id="modelo"  name="modelo">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating ">
                                    <label class="control-label" >Serie:</label>
                                    <input type="text" class="form-control" id="serie"  name="serie">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating ">
                                    <label class="control-label">Problema:</label>
                                    <textarea class="form-control" id="problema"  name="problema" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating ">
                                    <label class="control-label">Observaciones:</label>
                                    <textarea class="form-control" id="observaciones"  name="observaciones" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating ">
                                    <label class="control-label" >Cliente:</label>
                                    <select class="selectpicker" data-style="btn btn-primary btn-round" name="cliente">
                                        <option selected disabled>Seleccione Cliente</option>
                                        <?php require("../obtain/lista_clientes.php");?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating ">
                                    <label class="control-label">Notas Internas:</label>
                                    <textarea class="form-control" id="notas"  name="notas" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                          <div align="right">
                            <button type="submit" class="btn btn-blue">Registrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<div class="modal-body" id="servicios_add" style="display: none;">
  <form class="form-horizontal" action="../request/add_servicio.php" method = "POST">
    <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating is-focused">
                                <label class="control-label" >Fecha de atención:</label>
                                <input type="date" class="form-control" id="fecha"  name="fecha" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating ">
                                <label class="control-label" >Hora de atención:</label>
                                <input type="datetime" class="form-control" id="hora"  name="hora" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating ">
                                <label class="control-label">Problema:</label>
                                <textarea class="form-control" id="problema"  name="problema" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating ">
                                <label class="control-label">Observaciones:</label>
                                <textarea class="form-control" id="observaciones"  name="observaciones" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating ">
                                <label class="control-label" >Empresa:</label>
                                <select class="selectpicker" data-style="btn btn-primary btn-round" name="cliente">
                                    <option selected disabled>Seleccione Cliente</option>
                                    <?php require("../obtain/lista_empresa.php");?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div align="right">
                        <button type="submit" class="btn btn-blue">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>




<!-- Modal Agregar Recibo-->
<div class="modal fade" id="modalRecibo" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Generar Recibo</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" action="../request/add_recibo.php" method="POST">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating ">
                                        <label class="control-label" >Cliente:</label>
                                        <select class="selectpicker" data-style="btn btn-primary btn-round" name="cliente">
                                            <option selected disabled>Seleccione Cliente</option>
                                            <?php require("../obtain/lista_clientes.php");?>
                                        </select>
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-12">
                                   <div class="form-group label-floating ">
                                    <label class="control-label" >Cantidad:</label>
                                    <input type="number" step=".01" class="form-control" id="suma"  name="suma">
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating ">
                                    <label class="control-label" >Concepto:</label>
                                    <textarea class="form-control" id="concepto"  name="concepto" rows="3"></textarea>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating ">
                                    <label class="control-label" >Notas:</label>
                                    <textarea class="form-control" id="notas"  name="notas" rows="3"></textarea>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div align="right">
                                <button type="submit" id="cita" name="cita" class="btn btn-rose">Registrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>



<!-- Modal Diagnosticar-->
<div class="modal fade" id="modaldiagnosticar" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Diagnosticar Equipo</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" action="../request/diagnostico_equipo.php" method="POST">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating ">
                                        <input type="hidden" name="id_equipo" id="id_equipo_diagnostico">
                                        <label class="control-label" >Diagnostico:</label>
                                        <textarea class="form-control" id="diagnostico"  name="diagnostico" rows="3"></textarea>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-focused">
                                        <label class="control-label" >Fecha de salida Aproximada:</label>
                                        <input type="date" class="form-control" name="fecha_salida">
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div align="right">
                                    <button type="submit" id="cita" name="cita" class="btn btn-success">Diagnosticar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<!-- Modal Diagnosticar-->
<div class="modal fade" id="modalasignar" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Asignar Equipo</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" action="../request/asignar_equipo.php" method="POST">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating ">
                                        <input type="hidden" name="id_asignar" id="id_asignar">
                                        <label class="control-label" >Asignar a:</label>
                                        <select class="form-control" name="usuario">
                                            <?php require("../obtain/usuarios.php"); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-focused">
                                        <label class="control-label" >Fecha Finalización:</label>
                                        <input type="date" name="fecha" class="form-control">
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div align="right">
                                    <button type="submit"  class="btn btn-success">Asignar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<!-- Modal Diagnosticar-->
<div class="modal fade" id="modalAsignarservicio" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Asignar Servicio</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" action="../request/asignar_servicio.php" method="POST">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating ">
                                        <input type="hidden" name="id_asignacion" id="id_asignacion">
                                        <label class="control-label" >Asignar a:</label>
                                        <select class="form-control" name="usuario">
                                            <?php require("../obtain/usuarios.php"); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-focused">
                                        <label class="control-label" >Fecha Finalización:</label>
                                        <input type="date" name="fecha" class="form-control">
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div align="right">
                                    <button type="submit"  class="btn btn-success">Asignar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>


<!-- Modal Dar salida-->
<div class="modal fade" id="modalsalir" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Entrega de Equipo</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" action="../request/registrar_salida.php" method="POST">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating ">
                                        <input type="hidden" name="id_equipo" id="id_equipo_salir">
                                        <label class="control-label" >Recibe:</label>
                                        <input type="text" class="form-control" name="recibe">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating ">

                                        <label class="control-label" >Entrega:</label>
                                        <input type="text" class="form-control" name="entrega">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating ">
                                        <label class="control-label" >Costo:</label>
                                        <input type="text" class="form-control" name="costo">
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating ">

                                        <label class="control-label" >Observaciones:</label>
                                        <input type="text" class="form-control" name="observaciones">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div align="right">
                                    <button type="submit" id="cita" name="cita" class="btn btn-success">Entregar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<div class="modal fade" id="modalTerminarServicio" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Termino de servicio</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" action="../request/registrar_salida_servicio.php" method="POST">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating ">
                                        <input type="hidden" name="id_equipo_terminar_serv" id="id_equipo_terminar_serv">
                                        <label class="control-label" >Autoriza:</label>
                                        <input type="text" class="form-control" name="autoriza">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating ">

                                        <label class="control-label" >Solucion:</label>
                                        <input type="text" class="form-control" name="solucion">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating ">

                                        <label class="control-label" >Observaciones:</label>
                                        <input type="text" class="form-control" name="observaciones">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div align="right">
                                    <button type="submit" id="cita" name="cita" class="btn btn-success">Finalizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<!-- Modal Agregar Cliente-->
<div class="modal fade" id="modalCliente" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar</h4>
          <select id="tipo_cliente" class="form-control">
            <option selected disabled="">Seleccione</option>
            <option value="0">Cliente</option>
            <option value="1">Empresa</option>
        </select>
    </div>
    <div class="modal-body" id="add_cliente_m" style="display: none;">
      <form class="form-horizontal" action="../request/add_cliente.php" method="POST">
        <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating ">
                                    <label class="control-label" >Nombre Completo:</label>
                                    <input type="text" step=".01" class="form-control" id="nombre"  name="nombre">
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating ">
                                    <label class="control-label" >Dirección:</label>
                                    <input type="text" step=".01" class="form-control" id="direccion"  name="direccion">
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating ">
                                    <label class="control-label" >Telefono:</label>
                                    <input type="text" step=".01" class="form-control" id="telefono1"  name="telefono1">
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating ">
                                    <label class="control-label" >Telefono 2 (opcional):</label>
                                    <input type="text" step=".01" class="form-control" id="telefono2"  name="telefono2">
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating ">
                                    <label class="control-label" >Email:</label>
                                    <input type="email" step=".01" class="form-control" id="email"  name="email">
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div align="right">
                                <button type="submit" id="cita" name="cita" class="btn btn-rose">Registrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal-body" id="add_empresa_m" style="display: none;">
  <form class="form-horizontal" action="../request/add_empresa.php" method="POST">
    <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating ">
                                <label class="control-label" >Nombre:</label>
                                <input type="text" class="form-control" id="nombre"  name="nombre">
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating ">
                                <label class="control-label" >Dirección:</label>
                                <input type="text" class="form-control" id="direccion"  name="direccion">
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating ">
                                <label class="control-label" >Telefono:</label>
                                <input type="text" step=".01" class="form-control" id="telefono"  name="telefono">
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating ">
                                <label class="control-label" >Email:</label>
                                <input type="email" class="form-control" id="email"  name="email">
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating ">
                                <label class="control-label" >RFC:</label>
                                <input type="text" class="form-control" id="rfc"  name="rfc">
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating ">
                                <label class="control-label" >Nombre de Contacto:</label>
                                <input type="text" class="form-control" id="nombre_contacto"  name="nombre_contacto">
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div align="right">
                            <button type="submit" id="cita" name="cita" class="btn btn-rose">Registrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
</div>
</div>
</div>

<!-- Modal Agregar Recibo-->
<div class="modal fade" id="modalUsuario" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Usuario</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" action="../request/add_usuario.php" method="POST">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating ">
                                        <label class="control-label" >Nombre Completo:</label>
                                        <input type="text" class="form-control" id="nombrecompleto"  name="nombrecompleto">
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-12">
                                   <div class="form-group label-floating ">
                                    <label class="control-label" >Usuario:</label>
                                    <input type="text" class="form-control" id="usuario"  name="usuario">
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating ">
                                    <label class="control-label" >Concepto:</label>
                                    <input type="password" class="form-control" id="password"  name="password">
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div align="right">
                                <button type="submit" id="cita" name="cita" class="btn btn-rose">Registrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</body>
<!--   Core JS Files   -->
<script src="../../assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/js/material.min.js" type="text/javascript"></script>
<script src="../../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../../assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../../assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="../../assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="../../assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="../../assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="../../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="../../assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="../../assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Select Plugin -->
<script src="../../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../../assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../../assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../../assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="../../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../../assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>

<script type="text/javascript">

   function ParametrosSalir(id)
   {
       $("#id_equipo_salir").val(id);
   }

   function ParametrosAsignar(id)
   {
       $("#id_asignar").val(id);
   }
   
   function ParametrosDiagnosticar(id)
   {
       $("#id_equipo_diagnostico").val(id);
   }


   function ParametrosAsignarserv(id)
   {
       $("#id_asignacion").val(id);
   }

   function ParametrosTerminar(id)
   {
       $("#id_equipo_salir").val(id);
   }

function ParametrosTerminarServ(id)
   {
       $("#id_equipo_terminar_serv").val(id);
   }


   $("#tiposervicios").change(function() {
      var tiposervicios = $("#tiposervicios").val();
      if(tiposervicios == "Equipos")
      {
        $("#lequipos").css('display', 'block');
        $("#lservicios").css('display', 'none');
        $("#lcomercializaciones").css('display', 'none');
    }
    else if(tiposervicios == "Servicios")
    {
        $("#lservicios").css('display', 'block');
        $("#lequipos").css('display', 'none');
        $("#lcomercializaciones").css('display', 'none');
    }
    else
    {
        $("#lservicios").css('display', 'none');
        $("#lequipos").css('display', 'none');
        $("#lcomercializaciones").css('display', 'block');
    }
});

</script>

<script>

    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
            ],
            responsive: true,
            language: {
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
          }
      });
        $('#datatables2').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
            ],
            responsive: true,
            language: {
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
          }
      });
        $('#datatables3').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
            ],
            responsive: true,
            language: {
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
          }
      });

    });

    
    $("#tipo_servicio").change(function() {
      var tipo_servicio = $("#tipo_servicio").val()

      if(tipo_servicio == 0)
      {
        $("#equipos_add").fadeIn();
        $("#equipos_add").fadeIn("slow");
        $("#equipos_add").fadeIn(3000);
        $("#servicios_add").fadeOut();
        $("#servicios_add").fadeOut("slow");
        $("#servicios_add").fadeOut(3000);
    }
    else
    {
        $("#servicios_add").fadeIn();
        $("#servicios_add").fadeIn("slow");
        $("#servicios_add").fadeIn(3000);
        $("#equipos_add").fadeOut();
        $("#equipos_add").fadeOut("slow");
        $("#equipos_add").fadeOut(3000);
    }


});

    $("#tipo_cliente").change(function() {
      var tipo_cliente = $("#tipo_cliente").val()

      if(tipo_cliente == 0)
      {
        $("#add_cliente_m").fadeIn();
        $("#add_cliente_m").fadeIn("slow");
        $("#add_cliente_m").fadeIn(3000);
        $("#add_empresa_m").fadeOut();
        $("#add_empresa_m").fadeOut("slow");
        $("#add_empresa_m").fadeOut(3000);
    }
    else
    {
        $("#add_cliente_m").fadeOut();
        $("#add_cliente_m").fadeOut("slow");
        $("#add_cliente_m").fadeOut(3000);
        $("#add_empresa_m").fadeIn();
        $("#add_empresa_m").fadeIn("slow");
        $("#add_empresa_m").fadeIn(3000);
    }


});

</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:34:04 GMT -->
</html>