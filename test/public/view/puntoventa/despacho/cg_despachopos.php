<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Despacho POS
        <small>POS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content" style="height: 1000px;">

        <div class="box box-success marco">
        <div class="box-header">
          <i class="fa fa-user"></i>
          <h3 class="box-title">Despacho de Crédito IPROSAP</h3>
        </div>
        <div class="box-body pad table-responsive">
          <div class="container-fluid">
              <div class="col-lg-10 col-lg-offset-1 col-sm-12">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="row">
                         <div class="col-sm-2 col-sm-offset-5">
                              <button class="btn btn-info btn-sm" ng-click="refresh()"><i class="fa fa-refresh" aria-hidden="true"></i>
                                  Actualizar
                              </button>
                         </div>
                     </div>
                    <div class="row">
                      <div class="">
                        <div class="col-md-12">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>#</th>
                            <th>Nombres</th>
                            <th>DNI/Placa</th>
                            <th>Serie</th>
                            <th>Producto</th>
                            <th>Monto</th>
                            <?php if($_SESSION["rol"]!= "CREDITO"){?>
                            <th>Acción</th>
                            <?php } ?>
                              </tr>
                            </thead>
                            <tbody>
                              <tr ng-repeat="des in dataDespacho">
                                <td style="font-size: 14px;">{{$index+1}}</td>
                                <td style="font-size: 14px;">{{des.apellidopat+" "+des.apellidomat+" "+des.nombres}}</td>
                                <td style="font-size: 14px;">{{des.dni+" / "+des.placa}}</td>
                                <td style="font-size: 14px;">
                                    <span id="num_serie{{$index+1}}" class="label label-default" style="font-size: 14px;">{{des.cred_num}}</span>
                                    <!--<button class="btn btn-default" ngclipboard data-clipboard-target="#num_serie{{$index+1}}">
                                        <i class="fa fa-clipboard"></i>
                                    </button>-->
                                </td>
                                <td style="font-size: 14px;">
                                    <span class="label bg-{{des.color}}" style="padding-right: 15px;padding-left: 15px;">{{des.producto}}</span>
                                </td>
                                <td style="font-size: 15px;">{{des.total | currency:"S/ ":2}}</td>
                                <?php if($_SESSION["rol"]!= "CREDITO"){?>
                                <td>
                                  <button class="btn btn-default btn-sm" style="font-size: 15px;" ngclipboard data-clipboard-target="#num_serie{{$index+1}}" ng-click="despacharProducto(des.idcred_iprosap,des.cred_num)"><i class="fa fa-handshake-o" aria-hidden="true"></i> Despachar
                                  </button>
                                </td>
                                <?php } ?>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>


                  </div>
                </div>

              </div>
          </div>
        </div>
      </div>

    </section>


    <!-- /.content -->
  </div>
