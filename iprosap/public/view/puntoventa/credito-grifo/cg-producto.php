<div class="col-lg-12">
   <div class="box box-default">
       <div class="box-body box-profile">
          <p>Lista de productos disponibles IPROSAP.</p>
          <form class="form-inline">
              <div class="row">
                <div class="col-lg-12 form-group text-center">
                    <div class="col-xs-12">
                        <label for="monto" style="font-size: 25px;">Monto S/ </label>
                    </div>
                    <div class="col-xs-12">
                        <input type="number" class="form-control input-lg col-xs-6 col-xs-offset-4" ng-model="cg_montoProd" style="width: 30%;" id="monto" placeholder="00.00" autofocus>
                    </div>
                    <div class="col-xs-12 monto_mx">
                          <span class="label label-danger"><i class="fa fa-exclamation-circle"></i> Monto máximo de credito aprovado: S/ {{importe_max}}</span>

                    </div>
                </div>
              </div>
          </form>
          <hr>

          <div class="row">

              <div class="col-lg-6 col-xs-12" ng-repeat="prod in productosCred">
                <div class="small-box bg-{{prod.color}}">
                  <div class="inner">
                    <h3>{{prod.n_corto}}</h3>

                    <p>{{prod.producto}}</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                  <a href="" class="small-box-footer" ng-click="cg_CreditoMove(prod.idproducto,prod.precio, prod.producto, prod.color)" style="padding-top: 10px; padding-bottom: 10px;">
                    Selecdcionar Producto <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>

              <!-- <div class="col-lg-6 col-xs-12">
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>G90</h3>

                    <p>Gasolina 90 Octanos</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                  <a href="" class="small-box-footer" ng-click="cg_move90()" style="padding-top: 10px; padding-bottom: 10px;">
                    Selecdcionar Producto <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>

              <div class="col-lg-6 col-xs-12">
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>G84</h3>

                    <p>Gasolina 84 Octanos</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                  <a href="" class="small-box-footer" ng-click="cg_move84()" style="padding-top: 10px; padding-bottom: 10px;">
                    Selecdcionar Producto <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div> -->

          </div>
          <div class="col-md-12">                    
                <div class="col-md-6 col-md-offset-3">
                    <button class="btn btn-default col-xs-12 col-md-6 col-md-offset-3" ui-sref="credito-grifo">Cancelar</button>
                </div>                
            </div>
      </div>
    </div>
</div>
