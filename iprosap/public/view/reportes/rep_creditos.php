<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Creditos
        <small>Reportes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content" style="height: 1000px;">

        <div class="row">
            <div class="col-lg-12 ">

              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Lista de Creditos</h3>
                  <div class="box-body">

                    <!-- FROMULARIO   -->
                    <div class="row">
                          <div id="contenedor-rep" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-lg-offset-0">
                              <div id="frmFechas" class="row" style="margin-bottom: 10px;">
                                  <div class="col-md-3 ">
                                      <div class="form-group">
                                          <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                                              <div class=" ">
                                                  <button type="button" class="btn btn-success" onclick="imprimir()">
                                                      <i class="fa fa-print"></i> Imprimir</button>
                                                  </button>
                                              </div>

                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-3">
                                      <div class="form-group">
                                        <label for="icono" class="col-md-3 control-label">Desde</label>
                                        <div class="col-md-9">
                                            <p class="input-group">
                                              <input type="text" readonly class="form-control" show-button-bar="false" popup-placement="bottom" uib-datepicker-popup="{{format}}" ng-model="dtIni" is-open="popup.opened" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" ng-change="chgFecha()"/>
                                              <span class="input-group-btn">
                                                <button type="button" class="btn btn-default" ng-click="open()"><i class="glyphicon glyphicon-calendar"></i></button>
                                              </span>
                                            </p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-3">
                                      <div class="form-group">
                                        <label for="icono" class="col-md-3 control-label">Hasta</label>
                                        <div class="col-md-9">
                                            <p class="input-group">
                                              <input type="text" readonly class="form-control" show-button-bar="false" popup-placement="bottom" uib-datepicker-popup="{{format}}" ng-model="dtFin" is-open="popup.opened2" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" ng-change="chgFecha()"/>
                                              <span class="input-group-btn">
                                                <button type="button" class="btn btn-default" ng-click="open2()"><i class="glyphicon glyphicon-calendar"></i></button>
                                              </span>
                                            </p>
                                        </div>
                                      </div>
                                    </div>
                             </div>
                             <div id="frmTransacciones" class="row" style="margin-bottom: 10px;">
                                  <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 table-personal">
                                      <div class="input-group">
                                          <input type="text" class="form-control" ng-model="txtbuscar" placeholder="Ingrese busqueda">
                                           <span class="input-group-addon">
                                               <span class="glyphicon glyphicon-search"></span>
                                           </span>
                                      </div>
                                   </div>
                             </div>

                             <div class="table-responsive marco col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                                 <section id="no-more-tables">
                                 <table id="tablaCaja" class="table table-bordered table-hover table-striped">
                                      <thead>
                                          <tr>
                                              <th width="5%" class="text-center">#</th>
                                              <th width="25%" class="text-center">Nombres</th>
                                              <th width="15%" class="text-center">Serie</th>
                                              <th width="10%" class="text-center">Otorgado</th>
                                              <th width="10%" class="text-center">Vence</th>
                                              <th width="5%" class="text-center">Importe</th>
                                              <th width="5%" class="text-center">Estado</th>
                                              <th id="accion" width="25%" class="text-center">Accion</th>
                                          </tr>
                                      </thead>
                                      <tbody>

                                          <tr ng-repeat="ls in lst">
                                              <td data-title="#:" class="text-center">{{$index+1}}</td>
                                              <td data-title="Nombres:">{{ls.apellidopat+" "+ls.apellidomat+" "+ls.nombres | uppercase}}</td>
                                              <td data-title="Serie:" class="text-center">{{ls.cred_num}}</td>
                                              <td data-title="Otorgado:" class="text-center">{{ls.fecha_ini}}</td>
                                              <td data-title="Vence:" class="text-center">{{ls.fecha_fin}}</td>
                                              <td data-title="Importe:">{{ ls.total | currency:"S/ ":2}}</td>
                                              <td data-title="Estado:" class="text-center">{{ls.estado_cred_name | uppercase}}</td>
                                              <td data-title="Accion:" id="accion"class="text-center">
                                                  <div class="col-sm-12">
                                                      <a type="button" class="btn btn-info" title="Visualizar registro persona" tooltip-placement="left" uib-tooltip="Visualizar" data-toggle="modal" data-target="#viewCaja">
                                                          <span class="fa fa-eye" aria-hidden="true"></span>
                                                      </a>
                                                      <a type="button" class="btn btn-danger" title="Eliminar registro" tooltip-placement="left" uib-tooltip="Eliminar" >
                                                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                      </a>
                                                  </div>
                                              </td>
                                          </tr>

                                      </tbody>
                                  </table>
                                 </section>
                              </div>
                         </div>
                     </div>
                    <!-- FIN FORMULARIO -->

                  </div>
                </div>
              </div>
            </div>
        </div>

    </section>


    <!-- /.content -->
  </div>
