<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Clientes
        <small>Mantenimeinto</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
          <!-- BOX -->
      <div class="box box-success marco">
        <div class="box-header">
          <i class="fa fa-user"></i>
          <h3 class="box-title">Personal</h3>
        </div>
        <div class="box-body pad table-responsive">
          <div class="container-fluid">
              <div class="col-lg-10 col-lg-offset-1 col-sm-12">
                <div class="panel panel-default">
                  <div class="panel-body">

                    <div class="row">
                      <div class="form-group">
                        <div class="col-md-2">
                          <button class="btn btn-primary" data-toggle="modal" data-target="#addPersonal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Personal</button>
                        </div>

                      </div>

                    </div><br>
                    <div class="row">
                      <div class="form-group">
                        <div class="col-md-2">
                          <select class="form-control">
                                <option hidden>Seleccione Tipo</option>
                                <option>option 2</option>
                               </select>
                        </div>
                        <div class="col-md-2">
                          <select class="form-control">
                                <option hidden>Seleccione Estado</option>
                                <option>option 2</option>
                               </select>
                        </div>
                        <div class="col-md-4 col-md-offset-4">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Buscar...">
                          </div>
                        </div>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="">
                        <div class="col-md-12">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>#</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>
                              <center>Genero</center>
                            </th>
                            <th>Fecha</th>
                            <th>Celular</th>
                            <th>Acción</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr ng-repeat="per in dataPersona">
                                <td>{{$index+1}}</td>
                                <td>{{per.nombres+" "+per.apellidopat+" "+per.apellidomat}}</td>
                                <td>{{per.dni}}</td>
                                <td>
                                  <center><i ng-if = "per.genero=='M'" class='fa fa-mars-stroke' aria-hidden='true' style='color: #0f90e0;font-weight: bold;'></i></center>
                                  <center><i ng-if = "per.genero=='F'" class='fa fa-venus' aria-hidden='true' style='color: #e520e5;font-weight: bold;'></i></center>
                                </td>
                                <td>{{per.fecha_nac}}</td>
                                <td>{{per.celular}}</td>
                                <td>
                                  <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                  <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminar" role="button"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="row">

                      <div class="col-md-3">
                        <div class="form-group"><br>
                          <label for=""> Mostrar: </label>
                          <select>
                                    <option hidden>10</option>
                                    <option>20</option>
                                    <option>30</option>
                                    <option>40</option>
                                    <option>50</option>
                                  </select>
                          <label for=""> registros</label>
                        </div>
                      </div>
                      <div class="col-md-2 col-md-offset-7">

                        <ul class="pagination pagination-sm">

                          <li><a href="#">&laquo;</a></li>
                          <li><a href="#">1</a></li>
                          <li><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#">&raquo;</a></li>
                        </ul>

                      </div>

                    </div>

                  </div>
                </div>

              </div>
          </div>
        </div>
      </div>
    </section>

<!--Moodal agregar-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="addPersonal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="nav-tabs-custom">
          <form role="form">
            <div class="box-body">

              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label for="">Nombres: </label>
                    <input type="text" class="form-control" id="" ng-model="frm.nombres" placeholder="Nombre">
                  </div>
                  <div class="col-md-4">
                    <label for="">Apellido paterno: </label>
                    <input type="text" class="form-control" id="" ng-model="frm.apaterno" placeholder="Apellido paterno">
                  </div>
                  <div class="col-md-4">
                    <label for="">Apellido Materno: </label>
                    <input type="text" class="form-control" id="" ng-model="frm.amaterno" placeholder="Apellido materno">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label for="">DNI: </label>
                    <input type="text" class="form-control" ng-model="frm.dni" placeholder="DNI">
                  </div>
                  <div class="col-md-4">
                    <label for="">Placa:</label>
                    <input type="text" class="form-control" ng-model="frm.placa" placeholder="Placa">
                  </div>   
                  <div class="col-md-4">
                    <label for="">Fecha de nacimiento: </label>
                    <input type="text" class="form-control"  ng-model="frm.fechanac">
                  </div>
                  
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <label for="">Género: </label>
                     <select name="" id="" class="form-control"  ng-model="frm.genero">
                        <option value="" hidden>Seleccione género</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="">Celular:</label>
                    <input type="text" class="form-control" ng-model="frm.celular" placeholder="N° Celular">
                  </div>
                  <div class="col-md-4">
                    <label for="">Correo electrónico:</label>
                    <input type="email" class="form-control" ng-model="frm.email" placeholder="Email">
                  </div>
                  
                </div>
              </div>

              <div class="form-group">
                <div class="row">   
                  <div class="col-md-4">
                    <label for="">Dirección: </label>
                    <input type="text" class="form-control" ng-model="frm.direccion" placeholder="direccion">
                  </div>               
                  <div class="col-md-4">
                    <label for="">Distrito:</label>
                    <input type="text" class="form-control" ng-model="frm.distrito" placeholder="Distrito">
                  </div>
                  <div class="col-md-4">
                    <label for="">Monto Maximo:</label>
                    <input type="number" class="form-control" ng-init="frm.galonesmx=0" ng-model="frm.montomx" placeholder="00.00">
                  </div>
                                    
                </div>
              </div>
              <div class="form-group">
                <div class="row">   
                 <div class="col-md-4">
                    <label for="">Galones Maximo:</label>
                    <input type="number" class="form-control" ng-init="frm.galonesmx=0" ng-model="frm.galonesmx"  placeholder="00.00">
                  </div>               
                                 
                  
                </div>
              </div>

            </div>

            <!-- /.box-body -->
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-eraser" aria-hidden="true"></i> Limpiar</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="save()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
            </div>
          </form>
              
        </div>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->  
    
    
    

    <!-- /.content -->
  </div>