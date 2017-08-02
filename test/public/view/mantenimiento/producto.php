<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Productos
        <small>Mantenimeinto</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content" style="height: 1000px;">

        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-md-offset-3">

                  <!-- TABLE: LATEST ORDERS -->
                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Lista de Productos</h3>
                    </div>
                    <div class="box-header with-border">
                      <a class="btn btn-sm btn-info btn-flat pull-left" data-toggle="modal" data-target="#agregar" title="Agregar Concepto" accesskey="n">
                           <!-- <i class="fa fa-money"></i> -->
                        Nuevo Producto
                      </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="table-responsive">
                        <table class="table no-margin">
                          <thead>
                          <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Abreviado</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acción</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td><a href="pages/examples/invoice.html">1</a></td>
                            <td>Gasolina 90 Octanos</td>
                            <td>{{12.70 | currency:"S/ ":2}}</td>
                            <td class="text-center class="text-center"">G90</td>
                            <td>
                              <div class="text-center"><span class="label label-success">Activo</span></div>
                            </td>
                            <td class="text-center">
                                 <div class="col-sm-12 col-sm-offset-0">
                                    <a class="btn btn-warning" title="Actualizar concepto" tooltip-placement="left" uib-tooltip="Actualizar" data-toggle="modal" data-target="#editar" ng-click="buscarObj(data.idconcepto)">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                     <a class="btn btn-danger" title="Eliminar concepto" tooltip-placement="left" uib-tooltip="Eliminar" ng-click="eliminarObj(data.idconcepto)" >
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.table-responsive -->
                    </div>
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.col -->

              </div>
        </div>

    </section>
    <!-- ::::::::::::::::::::::::::: Modal Agregar Precio :::::::::::::::::::::::::::::::::::::::::::::::: -->
                <div class="modal animated bounceInLeft" id="agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"><i class="fa fa-usd"></i> Nuevo Precio</h4>
                      </div>
                    <form name="frmPrecio" class="form-horizontal">
                      <div class="modal-body">
                          <!-- formulario -->
                            <p>*Debe llenar todos los campos</p>
                             <div class="row">
                               <div class="form-group col-lg-12">
                                 <div class="form-group">
                                   <div class="col-sm-6 col-md-6" ng-class="{'has-error': frmPrecio.producto.$error.required}">
                                     <label for="producto" class="col-sm-3 control-label ">Producto</label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" name="producto" id="producto" ng-model="producto" required placeholder="Nombre del Producto" autofocus>
                                       <div ng-show="frmPrecio.producto.$error.required" class="help-block">*Debe llenar este campo</div>
                                     </div>
                                   </div>
                                   <div class="col-sm-6 col-md-6" ng-class="{'has-error': frmPrecio.precio.$error.required}">
                                     <label for="precio" class="col-sm-3 control-label ">Precio</label>
                                     <div class="col-sm-9">
                                       <input type="number" class="form-control" name="precio" id="precio" ng-model="precio" placeholder="Precio" required>
                                       <div ng-show="frmPrecio.precio.$error.required" class="help-block">*Debe llenar este campo</div>
                                     </div>
                                   </div>
                                 </div>
                                 <div class="form-group">
                                   <div class="col-sm-6 col-md-6" ng-class="{'has-error': frmPrecio.abreviado.$error.required}">
                                     <label for="abreviado" class="col-sm-3 control-label ">Abreviado</label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" name="abreviado" id="abreviado" ng-model="abreviado" placeholder="Nombre Abreviado" required>
                                       <div ng-show="frmPrecio.abreviado.$error.required" class="help-block">*Debe llenar este campo</div>
                                     </div>
                                   </div>
                                   <div class="col-sm-6 col-md-6" ng-class="{'has-error': frmPrecio.color.$error.required}">
                                     <label for="color" class="col-sm-3 control-label">Color</label>
                                     <div class="col-sm-9">
                                       <select id="color" name="color" class="form-control">
                                          <option value="" selected>--Elegir--</option>
                                          <option value="">Verde</option>
                                          <option value="">Rojo</option>
                                          <option value="">Celeste</option>
                                          <option value="">Gris</option>
                                       </select>
                                       <div ng-show="frmPrecio.color.$error.required" class="help-block">*Debe llenar este campo</div>
                                     </div>
                                   </div>
                                 </div>
                                 <div class="form-group">
                                   <div class="col-sm-6" ng-class="{'has-error': frmPrecio.estado.$error.required}">
                                     <label for="estado" class="col-sm-3 control-label">Estado</label>
                                     <div class="col-sm-9">
                                       <select id="estado" name="estado" ng-model="estado" class="form-control">
                                          <option value="" selected>--Elegir--</option>
                                          <option value="">Activo</option>
                                          <option value="">Desactivo</option>
                                       </select>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                             </div>
                          <!-- fin formulario -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="clearfrm()"><i class="fa fa-close"></i> Cerrar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="objadd.addObj()"><i class="fa fa-save" ></i> Guardar</button>
                      </div>
                     </form>
                    </div>
                  </div>
                </div>
    <!-- ::::::::::::::::::::::::::::::::::::::: fin Modal Agregar :::::::::::::::::::::::::::::::::::::::::::::::::::: -->
    <!-- ::::::::::::::::::::::::::: Modal Editar Precio :::::::::::::::::::::::::::::::::::::::::::::::: -->
                <div class="modal animated bounceInLeft" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"><i class="fa fa-usd"></i> Editar Precio</h4>
                      </div>
                    <form class="form-horizontal">
                      <div class="modal-body">
                          <!-- formulario -->
                            <p>*Debe llenar todos los campos</p>
                             <div class="row">
                               <div class="form-group col-lg-12">
                                 <div class="form-group">
                                   <div class="col-sm-6 col-md-6">
                                     <label for="producto" class="col-sm-3 control-label ">Producto</label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" name="producto" id="producto" placeholder="Nombre del Producto" autofocus>
                                     </div>
                                   </div>
                                   <div class="col-sm-6 col-md-6">
                                     <label for="producto" class="col-sm-3 control-label ">Precio</label>
                                     <div class="col-sm-9">
                                       <input type="number" class="form-control" name="producto" id="producto" placeholder="Precio" autofocus>
                                     </div>
                                   </div>
                                 </div>
                                 <div class="form-group">
                                   <div class="col-sm-6 col-md-6">
                                     <label for="producto" class="col-sm-3 control-label ">Abreviado</label>
                                     <div class="col-sm-9">
                                       <input type="text" class="form-control" name="producto" id="producto" placeholder="Nombre Abreviado" autofocus>
                                     </div>
                                   </div>
                                   <div class="col-sm-6 col-md-6">
                                     <label for="color" class="col-sm-3 control-label">Color</label>
                                     <div class="col-sm-9">
                                       <select id="color" name="color" class="form-control">
                                          <option value="" selected>--Elegir--</option>
                                          <option value="">Verde</option>
                                          <option value="">Rojo</option>
                                          <option value="">Celeste</option>
                                          <option value="">Gris</option>
                                       </select>
                                     </div>
                                   </div>
                                 </div>
                                 <div class="form-group">
                                   <div class="col-sm-6">
                                     <label for="estado" class="col-sm-3 control-label">Estado</label>
                                     <div class="col-sm-9">
                                       <select id="estado" name="estado" class="form-control">
                                          <option value="" selected>--Elegir--</option>
                                          <option value="">Activo</option>
                                          <option value="">Desactivo</option>
                                       </select>
                                     </div>
                                   </div>
                                 </div>

                               </div>
                             </div>
                          <!-- fin formulario -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="clearfrm()"><i class="fa fa-close"></i> Cerrar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="objadd.addObj()"><i class="fa fa-save" ></i> Editar</button>
                      </div>
                     </form>
                    </div>
                  </div>
                </div>
    <!-- ::::::::::::::::::::::::::::::::::::::: fin Modal Editar :::::::::::::::::::::::::::::::::::::::::::::::::::: -->
    <!-- /.content -->
  </div>
