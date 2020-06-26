<?php
session_start();


if (!isset($_SESSION['email'])) {
    header('Location: adminLogin.php');
    exit();
}

include_once 'partials/head.php'; ?>
<?php include_once 'partials/sidebar.php'; ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5 flex">


<div class="card-group">
        <div class="card " style="width: 35rem; ">
          <div class="card-body">
            <h5 class="card-title">Suscriptore por Especialidad</h5>
            <div class="card-body">
              <div class="barsus"></div>
            </div>
          </div>
        </div>
        <div class="card " style="width: 35rem; ">
          <div class="card-body">
            <h5 class="card-title">Busquedas por Especialidad</h5>
            <div class="card-body">
              <div class="barcli"></div>
            </div>
          </div>
        </div>
</div>
		</div>


  </body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $('.barsus').load('ajax/barsus.php');
    $('.barcli').load('ajax/barcli.php');
  })
</script>
