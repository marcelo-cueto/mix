<?php
include ('conect.php');

$query='SELECT sueldos,
sociedades,
monotributo,
impuestos,

autonomos,
contabilidad,
gestion,
judiciales,
certificaciones
FROM clientes ';
$result=mysqli_query($conn, $query);


if(!$result){
  die('Error de conexion: '. mysqli_connect_errno());
}else{
  $sueldo=0;
  $sociedades=0;
  $monotributo=0;
  $impuestos=0;

  $autonomos=0;
  $contabilidad=0;
  $gestion=0;
  $judiciales=0;
  $certificaciones=0;
  while($data= mysqli_fetch_assoc($result)){


      if($data['sueldos']=='si'){
        $sueldos=$sueldo++;
      }
      if($data['sociedades']=='si'){
        $sociedades++;
      }
      if($data['monotributo']=='si'){
        $monotributo++;
      }
      if($data['impuestos']=='si'){
        $impuestos=$impuestos+1;
      }

      if($data['contabilidad']=='si'){
        $contabilidad++;
      }
      if($data['gestion']=='si'){
        $gestion++;
      }
      if($data['judiciales']=='si'){
        $judiciales++;
      }
      if($data['certificaciones']=='si'){
        $certificaciones++;
      }





  }

mysqli_close($conn);
}

?>
<head>
               <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<div id="barcli" >
</div>
<script type="text/javascript">
    var tsu=<?php echo $sueldo; ?>;
    var tso=<?php echo $sociedades; ?>;
    var tmo=<?php echo $monotributo; ?>;
    var tim=<?php echo $impuestos; ?>;

    var tco=<?php echo $contabilidad; ?>;
    var tge=<?php echo $gestion; ?>;
    var tju=<?php echo $judiciales; ?>;
    var tce=<?php echo $certificaciones; ?>;
    var layout = {
      autosize: false,
      width: 400,
      height: 400,


      plot_bgcolor: '#fff'
    };
    var data = [
            {
                x: ['Sueldos', 'sociedades', 'monotibuto','impuestos','matricula','contabilidad','gestion', 'judiciales',' certificaciones'],
                y: [tsu, tso, tmo,tim,tco,tge,tju,tce],
                marker: {color: '#60E2D2'},

                type: 'bar'
                    }
            ];

    Plotly.newPlot('barcli', data,layout);

</script>
