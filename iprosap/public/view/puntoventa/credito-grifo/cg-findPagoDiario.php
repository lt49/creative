<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="col-xs-12">
    <!-- <div class="panel panel-default">
      <div class="panel-body"> -->
    <div class="box box-default">
       <div class="box-body box-profile">
            <h3 class="text-center"><strong>Inversión diaria</strong></h3>
            <p>*Debe pagar su cuota diaria para recivir los beneficios y servicios de <strong><?=$_SESSION["name_comercial"]?></strong>.</p>
            <hr/>
            <div class="col-xs-12">

                <p class="col-md-6 text-right" style="font-size:18px;">Monto total:</p>
                <p class="col-md-6 text-left" style="font-size:18px;">S/ 1.00</p>

            </div>
            <hr/>
            <hr/>
            <hr/>
            <div class="col-md-6 col-md-offset-3">
                <button class="btn btn-success col-xs-12" ng-click="pagarDiario()">Pagar</button>
            </div>

      </div>
    </div>
</div>
