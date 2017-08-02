<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.11 |
      <?php
      		$hoy = getdate();
      		echo $hoy["hours"].":".$hoy["minutes"];
      		echo " - ";
      		echo $hoy["mday"]; echo "/"; echo $hoy["mon"]; echo "/"; echo $hoy["year"];
      		echo " - ";
      		echo 'Ahora: '.date('Y-m-d') ."\n";
      		echo "-".date("H:i:s");
      		$diaSiguiente = time() + (1 * 24 * 60 * 60);
      		echo '<br>Día Siguiente: '. date('Y-m-d | H:i:s', $diaSiguiente) ."\n";
      ?>
    </div>
    <strong>Copyright &copy; 2014-2016 - {{5+1}} <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
</footer>
