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
                    <li class="active">
                        <a href="dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
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
                                <li>
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
                        <div class="col-md-7">
                            <div class="card card-calendar" style="padding: 1%;">
                                <select class="form-control" id="tipotarea">
                                    <option value="0">Equipos</option>
                                    <option value="1">Servicios</option>
                                    <option value="2">Comercializaciones</option>
                                </select>
                                <div class="material-datatables" id="lequipos">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="disabled-sorting">Equipo</th>
                                                <th class="disabled-sorting">Problema</th>
                                                <th class="disabled-sorting">Fecha Ingreso</th>
                                                <th class="disabled-sorting">Fecha Salida</th>
                                                <th class="disabled-sorting">Operaciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php require_once("../obtain/mistareas1.php");?>
                                       </tbody>
                                   </table>
                               </div>
                               <div class="material-datatables" id="lservicios" style="display: none">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="disabled-sorting">Empresa</th>
                                            <th class="disabled-sorting">Direccion</th>
                                            <th class="disabled-sorting">Telefono</th>
                                            <th class="disabled-sorting">Problema</th>
                                            <th class="disabled-sorting">Observaciones</th>
                                            <th class="disabled-sorting">Operaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php require_once("../obtain/mistareas2.php");?>
                                   </tbody>
                               </table>
                           </div>
                           <div class="material-datatables" id="lcomercializaciones" style="display: none">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="disabled-sorting">Equipo</th>
                                        <th class="disabled-sorting">Problema</th>
                                        <th class="disabled-sorting">Fecha Ingreso</th>
                                        <th class="disabled-sorting">Fecha Salida</th>
                                        <th class="disabled-sorting">Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php require_once("../obtain/mistareas3.php");?>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
               <div class="col-md-5">
                <div class="card card-calendar">
                    <div class="card-content" class="ps-child">
                        <div id="fullCalendar"></div>
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
<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title">Detalles del Servicio</h4>
            </div>
            <div id="modalBody" class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
<div class="modal fade" id="modalensitio" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">En Sitio</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" action="../request/ensitio.php" method="POST">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating is-focused">
                                        <label class="control-label" >Latitud:</label>
                                        <input type="hidden" name="id_servicio" id="id_ensitio">
                                        <input type="text" name="latitud" id="latitud" readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating is-focused">
                                        <label class="control-label" >Longitud:</label>
                                        <input type="text" name="longitud" id="longitud" readonly class="form-control">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-focused">
                                        <label class="control-label" >Observaciones Previas:</label>
                                        <textarea rows="5" name="observacionesprevias" id="observacionesprevias" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div align="right">
                                    <button type="submit" id="cita" name="cita" class="btn btn-success">Comenzar</button>
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

<script>
    function ParametrosTerminarServ(id)
    {
       $("#id_equipo_terminar_serv").val(id);
    }

    function par(id)
    {
     $("#id_equipo_diagnostico").val(id);

    }
    function Onsite(id)
    {
        $("#id_ensitio").val(id);
        getLocation();
    }

    function getLocation() {
        if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser");
        }
    }

    function showPosition(position) {
        $("#latitud").val(position.coords.latitude);
        $("#longitud").val(position.coords.longitude);
    }

$(document).ready(function() {




    var date = new Date();
    var yyyy = date.getFullYear().toString();
    var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
    var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

    $('#fullCalendar').fullCalendar({
       monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
       monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
       dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
       dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
       locale: 'es',
       header: {
        language: 'es',
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay',

    },
    defaultDate: yyyy+"-"+mm+"-"+dd,
    editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            select: function(start, end) {

                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd').modal('show');
            },
            eventRender: function(event, element) {
                element.bind('dblclick', function() {
                    $('#ModalEdit #id').val(event.id);
                    $('#ModalEdit #title').val(event.title);
                    $('#ModalEdit #color').val(event.color);
                    $('#ModalEdit').modal('show');
                });
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position

                edit(event);

            },
            eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

                edit(event);

            },
            eventColor: 'green',
            events: [
            <?php foreach($events as $event): 

                $start = explode(" ", $event['inicio']);
                $end = explode(" ", $event['fin']);
                if($start[1] == '00:00:00'){
                    $start = $start[0];
                }else{
                    $start = $event['inicio'];
                }
                if($end[1] == '00:00:00'){
                    $end = $end[0];
                }else{
                    $end = $event['fin'];
                }
                ?>
                {
                    id: '<?php echo $event['id']; ?>',
                    title: '<?php echo $event['equipo']." ".$event['modelo']; ?>',
                    start: '<?php echo $start; ?>',
                    end: '<?php echo $end; ?>',

                },
            <?php endforeach; ?>



            <?php foreach($events2 as $event2): 

                $start2 = $event2['fecha'];
                $end2 = explode(" ", $event2['fecha']);
                ?>
                {
                    id: '<?php echo $event2['id']; ?>',
                    title: '<?php echo substr($event2['problema'], 0, 150); ?>',
                    start: '<?php echo $start2; ?>',
                    color: '#3498DB',


                },
            <?php endforeach; ?>
            ],
            eventClick:  function(event, jsEvent, view) {
                $('#modalBody').html(event.title);
                $('#eventUrl').attr('href',event.url);
                $('#fullCalModal').modal();
            }

        });

    function edit(event){
        start = event.start.format('YYYY-MM-DD HH:mm:ss');
        if(event.end){
            end = event.end.format('YYYY-MM-DD HH:mm:ss');
        }else{
            end = start;
        }

        id =  event.id;

        Event = [];
        Event[0] = id;
        Event[1] = start;
        Event[2] = end;

        $.ajax({
           url: '../request/editEventDate.php',
           type: "POST",
           data: {Event:Event},
           success: function(rep) {
            if(rep == 'OK'){
             swal("Evento Actualizado!", "Evento se ha guardado correctamente", "success");
         }else{
            alert('No se pudo guardar. Inténtalo de nuevo.'); 
        }
    }
});
    }

    $("#calendariobtn").click(function() {
        setTimeout(function(){ $('#calendar').fullCalendar('render'); }, 50);

    });

});

$("#tipo_servicio").change(function() {
  var tipo_servicio = $("#tipo_servicio").val();
  console.log("entro");


  if(tipo_servicio == 0)
  {
    console.log(tipo_servicio);
    $("#equipos_add").fadeIn();
    $("#equipos_add").fadeIn("slow");
    $("#equipos_add").fadeIn(3000);
    $("#servicios_add").fadeOut();
    $("#servicios_add").fadeOut("slow");
    $("#servicios_add").fadeOut(3000);
}
else
{
    console.log(tipo_servicio);
    $("#servicios_add").fadeIn();
    $("#servicios_add").fadeIn("slow");
    $("#servicios_add").fadeIn(3000);
    $("#equipos_add").fadeOut();
    $("#equipos_add").fadeOut("slow");
    $("#equipos_add").fadeOut(3000);
}


});

$("#tipotarea").change(function() {
  var tipotarea = $("#tipotarea").val()

  if(tipotarea == 0)
  {
    $("#lequipos").fadeIn();
    $("#lequipos").fadeIn("slow");
    $("#lequipos").fadeIn(3000);
    $("#lservicios").fadeOut();
    $("#lservicios").fadeOut("slow");
    $("#lservicios").fadeOut(3000);
    $("#lcomercializaciones").fadeOut();
    $("#lcomercializaciones").fadeOut("slow");
    $("#lcomercializaciones").fadeOut(3000);
}
else if(tipotarea == 1)
{
    $("#lservicios").fadeIn();
    $("#lservicios").fadeIn("slow");
    $("#lservicios").fadeIn(3000);
    $("#lequipos").fadeOut();
    $("#lequipos").fadeOut("slow");
    $("#lequipos").fadeOut(3000);
    $("#lcomercializaciones").fadeOut();
    $("#lcomercializaciones").fadeOut("slow");
    $("#lcomercializaciones").fadeOut(3000);
}
else
{
    $("#lcomercializaciones").fadeIn();
    $("#lcomercializaciones").fadeIn("slow");
    $("#lcomercializaciones").fadeIn(3000);
    $("#lequipos").fadeOut();
    $("#lequipos").fadeOut("slow");
    $("#lequipos").fadeOut(3000);
    $("#lservicios").fadeOut();
    $("#lservicios").fadeOut("slow");
    $("#lservicios").fadeOut(3000);
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

});



</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:34:04 GMT -->
</html>