<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="col-xs-12">
    <!-- <div claswwwwwwwwwwws="panel panel-default">
      <div class="panel-body"> -->
    <div class="box box-default">
       <div class="box-body box-profile">
            <h3 class="text-center"><strong>Creditos a cancelar</strong></h3>
            <p>*Debe cancelar la deuda para seguir recibiendo los beneficios y servicios de <strong><?=$_SESSION["name_comercial"]?></strong>.</p>
            <hr/>
            <div class="col-xs-12">
            	<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th>#</th>
							<th>Fecha</th>
							<th>Serie</th>
							<th>Producto</th>
							<th>Subtotal</th>
						</tr>
						<tr ng-repeat="cd in DeudasCred">
							<td>{{$index+1}}</td>
							<td>{{cd.fecha_ini}}</td>
							<td>{{cd.cred_num}}</td>
							<td>{{cd.n_corto}}</td>
							<td>{{cd.cantidad*cd.precio | currency:"S/ ":2}}</td>
						</tr>
					</table>
            	</div>
                <p class="col-xs-6 text-right" style="font-size:18px;">Monto total:</p>
                <p class="col-xs-6 text-left" style="font-size:18px;">{{total | currency:"S/ ":2}}</p>

            </div>
            <hr/>
            <hr/>
            <hr/>
            <div class="col-md-6 col-md-offset-3">
                <button class="btn btn-success col-xs-12 col-md-offset-3 col-md-6" ng-click="pagarCreditos()">Pagar</button>
            </div>

      </div>
    </div>
</div>
