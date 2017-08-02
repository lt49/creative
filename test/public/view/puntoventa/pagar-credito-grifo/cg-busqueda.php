<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <span class="fa fa-money"></span> Pagar Crédito
        
        <small>Punto de Venta</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#!dashboard"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content" style="height: 1700px;">
        <div class="row">

           <div class="col-xs-12 col-md-5 col-lg-4">
              <div class="col-xs-12">
                  <div class="box box-success">
                      <div class="box-body box-profile">
                        <div class="col-lg-12">
                           <div class="input-group"  ng-keypress="buscarCliente($event)">
                                <input class="form-control" style="font-size:20px;" type="text" placeholder="Buscar ..." tooltip-placement="bottom" uib-tooltip="Ingrese documento" ng-model="documento" onkeypress="return txtSoloNumeros(event)" clean="true" autofocus maxlength="8" />

                                <span class="input-group-btn">
                                  <button type="button" id="agregarModal" class="btn btn-iprosap" tooltip-placement="bottom" uib-tooltip="Buscar" ng-click="buscar()">
                                      <i class="fa fa-search"></i>
                                  </button>
                                </span>
                            </div>
                        </div>

                        <!-- <div class="col-lg-3">
                          <toggle ng-model="docEstado" ng-change="changed()" on="Placa" off="DNI" onstyle="btn-warning">
                        </div> -->
                    </div>
                </div>
              </div>


           </div>



            <!-- col-xs-push-12 -->
           <div class="col-xs-12 col-xs-offset-0 col-md-7 col-lg-8 col-lg-push-0 visible-md visible-lg">
              <div class="col-xs-12">
                  <div class="box box-success">
                      <div class="box-body box-profile">
                          <p class="text-center" style="font-size: 18px;">DETALLES DE LA VENTA</p>
                    </div>
                  </div>
              </div>
           </div>

          <!-- col-xs-pull-12 -->

            <!-- <div class="col-xs-12 col-md-6 col-lg-4" ui-view="creditoIP">

                <div class="col-xs-12">
                  <div class="panel panel-default">
                    <div class="panel-body">
                          <p class="text-center" style="font-size: 18px;">Detalles Principal A</p>
                    </div>
                  </div>
                </div>

            </div>



            <div class="col-md-6 col-lg-8" ui-view="creditoIPdetail">

              <div class="col-xs-12">
                  <div class="panel panel-default">
                    <div class="panel-body">
                          <p class="text-center" style="font-size: 18px;">Detalles Debajo B</p>
                    </div>
                  </div>
              </div>

            </div> -->







        </div>










        <div class="row">
             <div class="col-md-5 col-lg-4" ui-view="creditoIP">

                  <div class="col-xs-12">
                    <div class="panel panel-default">
                      <div class="panel-body">
                            <p class="text-center" style="font-size: 18px;">Detalles Principal</p>
                      </div>
                    </div>
                  </div>

              </div>


              <!-- <div class="col-xs-12 col-xs-offset-0 col-md-6 col-lg-8 col-lg-push-0 visible-md visible-lg">
                <div class="col-xs-12">
                    <div class="box box-warning">
                        <div class="box-body box-profile">
                            <p class="text-center" style="font-size: 18px;">DETALLES DE LA VENTA</p>
                      </div>
                    </div>
                </div>
                           </div> -->


              <div class="col-md-7 col-lg-8" ui-view="creditoIPdetail">

                <div class="col-xs-12">
                    <div class="panel panel-default">
                      <div class="panel-body">
                            <p class="text-center" style="font-size: 18px;">Detalles Debajo</p>
                      </div>
                    </div>
                </div>

              </div>
        </div>




        <!-- <div class="row">
            <div class="col-md-6 col-lg-4" ui-view="creditoIP">

                <div class="col-xs-12">
                  <div class="panel panel-default">
                    <div class="panel-body">
                          <p class="text-center" style="font-size: 18px;">Detalles Principal</p>
                    </div>
                  </div>
              </div>

            </div>

            <div class="col-md-6 col-lg-8" ui-view="creditoIPdetail">

              <div class="col-xs-12">
                  <div class="panel panel-default">
                    <div class="panel-body">
                          <p class="text-center" style="font-size: 18px;">Detalles Debajo</p>
                    </div>
                  </div>
              </div>

           </div>

        </div> -->


    </section>


    <!-- /.content -->
  </div>
