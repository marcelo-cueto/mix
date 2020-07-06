<?php

include ('conect.php');

$query='SELECT fecha, COUNT(*)
FROM contadorn
GROUP BY fecha ';
$result=mysqli_query($conn, $query);

if(!$result){
  die('Error de conexion: '. mysqli_connect_errno());
}else{
  while($data= mysqli_fetch_assoc($result)){

    $arreglox['data'][]=$data['COUNT(*)'];
    $arregloy['data'][]=$data['fecha'];
  }



$datosx=json_encode($arreglox);
$datosy=json_encode($arregloy);

}

?>
<head>
               <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<div id="pva" >
</div>
<script type="text/javascript">
function crearr(a){
  var parsed=JSON.parse(a);
  var arr=[];
  for(var x in parsed){
    arr.push(parsed[x]);
  }
  return arr;
}
var datosX=<?php echo $datosx?>;
var datosY=<?php echo $datosy?>;

    var layout = {
      autosize: true,
  


      plot_bgcolor: '#fff'
    };
    var data = [
            {
                x: datosY['data'],
                y: datosX['data'],
                marker: {color: '#60E2D2'},

                type: 'scutter'
                    }
            ];

    Plotly.newPlot('pva', data, layout);

</script>
