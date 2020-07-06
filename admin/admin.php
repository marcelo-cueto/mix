<?php
session_start();


if (!isset($_SESSION['admin_email'])) {
    header('Location: adminLogin.php');
    exit();
}

include_once 'partials/head.php'; ?>
<?php include_once 'partials/sidebar.php'; ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5 flex">
        <div class="d-flex">

        </div>
        <div class="card-deck" style='margin-bottom:1%;'>
          <div class="card " >
            <div class="card-header" style='background-color:#60E2D2;'><h5 class="card-title">Visitas Home</h5></div>
            <div class="card-body" >



                <div class="viho"></div>

            </div>
          </div>
          <div class="card " >
            <div class="card-header" style='background-color:#60E2D2;'><h5 class="card-title">Visitas Noticias</h5></div>
            <div class="card-body" >



                <div class="vino"></div>

            </div>
          </div>
          <div class="card " >
            <div class="card-header" style='background-color:#60E2D2;'><h5 class="card-title">Clicks Profesionales</h5></div>
            <div class="card-body" >



                <div class="clpr"></div>

            </div>
          </div>
          <div class="card " >
            <div class="card-header" style='background-color:#60E2D2;'><h5 class="card-title">Clicks Clientes</h5></div>
            <div class="card-body" >



                <div class="clcl"></div>

            </div>
          </div>
        </div>

<div class="card-deck" style='margin-bottom:1%;'>
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
<div class="card-deck" style='margin-bottom:1%;'>


        <div class="card " >
          <div class="card-header" style='background-color:#60E2D2;'><h5 class="card-title">Como conocieron</h5></div>



            <div id='piesus' class="card-body">


          </div>
        </div>
        <div class="card " >
          <div class="card-header" style='background-color:#60E2D2;'><h5 class="card-title">Noticias Publicadas</h5></div>



            <div id='scutter' class="card-body">


          </div>
        </div>
  </div>
  <div class="card-deck">


          <div class="card " >
            <div class="card-header" style='background-color:#60E2D2;'><h5 class="card-title">Visitas a Noticias por Día</h5></div>



              <div id='tvn' class="card-body">


            </div>
          </div>

    </div>
</div>

		</div>


  </body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    viho();
    vino();
    clpr();

    $('.barsus').load('ajax/barsus.php');
    $('.barcli').load('ajax/barcli.php');
    $('#tvn').load('ajax/tvn.php');
    $('#scutter').load('ajax/timenote.php');
    pie();


  })
  var clpr=function(){
    $.ajax({
      method:'POST',
      url:'ajax/clpr.php',
    }).done(function(data){
      console.log(data);
      $('.clpr').text(data).css({ 'font-size': '200%'});
    })
  }
  var vino=function(){
    $.ajax({
      method:'POST',
      url:'ajax/vino.php',
    }).done(function(data){
      console.log(data);
      $('.vino').text(data).css({ 'font-size': '200%'});
    })
  }
  var viho=function(){
    $.ajax({
      method:'POST',
      url:'ajax/viho.php',
    }).done(function(data){
      console.log(data);
      $('.viho').text(data).css({ 'font-size': '200%'});
    })
  }
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

</script>
