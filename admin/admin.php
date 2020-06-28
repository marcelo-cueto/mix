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
        <div class="d-flex">

        </div>

<div class="card-deck">
        <div class="card " >
          <div class="card-header" style='background-color:#60E2D2;'><h5 class="card-title">Suscriptores por Especialidad</h5></div>
          <div class="card-body" >



              <div class="barsus"></div>

          </div>
        </div>
        <div class="card " >
          <div class="card-header" style='background-color:#60E2D2;'><h5 class="card-title">Busquedas por Especialidad</h5></div>


            <div class="card-body">
              <div class="barcli"></div>

          </div>
        </div>


</div>
<div class="card-deck">


        <div class="card " >
          <div class="card-header" style='background-color:#60E2D2;'><h5 class="card-title">Como conocieron</h5></div>



            <div id='piesus' class="card-body">


          </div>
        </div>
        <div class="card " >
          <div class="card-header" style='background-color:#60E2D2;'><h5 class="card-title">Como conocieron</h5></div>



            <div id='scutter' class="card-body">


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
    pie();
    scutter();
  })
  var pie=function(){
    $.ajax({
      method:'POST',
      url: 'ajax/piesus.php',

    }).done(function(info){

      var a= JSON.parse(info);
      var layout = {
        autosize: false,
        width: 400,
        height: 400,


        plot_bgcolor: '#c7c7c7'
      };
      var data = [{
              values: [a['data'][0]['COUNT(*)'], a['data'][1]['COUNT(*)'], a['data'][2]['COUNT(*)'],a['data'][3]['COUNT(*)']],
              labels: [a['data'][0]['recomendado'], a['data'][1]['recomendado'], a['data'][2]['recomendado'],a['data'][3]['recomendado']],
                hole: .8,
              type: 'pie'
            }];



      Plotly.newPlot('piesus', data, layout);


    })
  }
  var scutter=function(){
    $.ajax({
      method:'POST',
      url: 'ajax/timenote.php',

    }).done(function(info){

      var b= JSON.parse(info);
      var layout = {
        autosize: false,
        width: 400,
        height: 400,


        plot_bgcolor: '#fff'
      };
      var va=[];
      var la=[];
      for (var i = 0; i < b['data'].length; i++) {

        va.push(b['data'][i]['COUNT(*)']);
        la.push(b['data'][i]['dates']);

      }

      var data = [{
              values: va,
              labels: la,
              type: 'scatter'
            }];



      Plotly.newPlot('scutter', data, layout);


    })
  }
</script>
