<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="col-lg-12">
   <div class="panel panel-default">
        <div class="panel-body">

          <!-- <div class="col-xs-12 col-sm-5">
                            <div class="info-box" >
                              <span class="info-box-icon bg-red"><i class="fa fa-free-code-camp"></i></span>
                              <div class="info-box-content">
                                <span class="info-box-text">GAS-84</span>
                                <span class="info-box-number">Producto</span>
                              </div>
                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-4">
                                <div class="panel panel-default">
                                  <div class="panel-body">
                                    <p style="font-size: 30px;" >S/ 20.00</p>
                                  </div>
                                </div>
                          </div>

                          <span class="input-group-btn col-xs-12 col-sm-3">
                              <a class="btn btn-app" style="padding-bottom: 52px;">
                                <i class="fa fa-trash-o"></i> Borrar
                              </a>
                          </span>     -->
              <div class="col-xs-12 col-sm-9">
                <div class="info-box" >
                  <span class="info-box-icon bg-{{color}}"><i class="fa fa-free-code-camp"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">{{producto}}</span>
                    <span class="info-box-number">Producto</span>
                  </div>
                </div>
              </div>

              <div class="col-xs-12 col-sm-3">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <p style="font-size: 30px;" >S/ {{monto}}</p>
                      </div>
                    </div>
              </div>






      </div>
    </div>
</div>

<div class="col-lg-12" style="margin-top: -15px;">
    <div class="panel panel-default">
      <div class="panel-body">
            <div class="col-sm-3 col-sm-offset-3">
                <a ui-sref="credito-grifo.credito" class="btn btn-default col-xs-12">Cancelar</a>
            </div>
            <div class="col-sm-3">
                <button class="btn btn-success col-xs-12" ng-click="addCredito()">Despachar</button>
            </div>
      </div>
    </div>
</div>
