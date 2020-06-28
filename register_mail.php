<?php
if (
   empty($_POST['name']) || empty($_POST['apellido']) || empty($_POST['email'])
   || empty($_POST['dni']) || empty($_POST['profesion'])
) {
   header('Location: register.php');
   exit();
}

$eol = PHP_EOL;
$emails = 'info@enlaceprofesional.com.ar';
$asunto = 'Profesional suscripto';
$mensaje = 'Hay un nuevo profesional suscripto' . $eol . $eol;
$mensaje .= 'Nombre: ' . $_POST['name'] . $eol;
$mensaje .= 'Apellido: ' . $_POST['apellido'] . $eol;
$mensaje .= 'E-mail: ' . $_POST['email'] . $eol;
$mensaje .= 'DNI: ' . $_POST['dni'] . $eol;
$mensaje .= 'Tel: ' . $_POST['tel'] . $eol;
$mensaje .= 'Profesión: ' . $_POST['profesion'] . $eol;
$mensaje .= 'Especialista en:';
if (isset($_POST['sueldos'])) $mensaje .= ' sueldos';
if (isset($_POST['impuestos'])) $mensaje .= ' impuestos';
if (isset($_POST['sociedad_pyme'])) $mensaje .= ' sociedad_pyme';
if (isset($_POST['contabilidad'])) $mensaje .= ' contabilidad';
if (isset($_POST['certificaciones'])) $mensaje .= ' certificaciones';
if (isset($_POST['monotributo'])) $mensaje .= ' monotributo';
if (isset($_POST['autonomos'])) $mensaje .= ' autonomos';
if (isset($_POST['gestion'])) $mensaje .= ' gestion';
if (isset($_POST['judiciales'])) $mensaje .= ' judiciales';
if (isset($_POST['otras'])) $mensaje .= ' '.$otras;
$mensaje .= $eol;
$mensaje .= 'Matrícula: ' . $_POST['matricula'] . $eol;
$mensaje .= 'Cómo nos conoció: ' . $_POST['conocio'] . $eol;
$mensaje .= 'Comentarios: ' . $_POST['coment'] . $eol;

var_dump($mensaje);
exit();

$header = 'From: no-responder@enlaceprofesional.com.ar' . $eol;
$header .= 'Reply-To: info@enlaceprofesional.com.ar' . $eol;
$header .= 'X-Mailer: PHP/' . phpversion();
$mail = mail($emails, $asunto, $mensaje, $header);

require_once 'header_web.php';
?>

<div id="colorlib-contact">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-md-push-1 animate-box" style='margin-top:1%'>
            <div class="col-md-9 animate-box center">
               <?php
                  if ($mail) {
                     echo "<h3>Tu mensaje fue enviado con exito!</h3>";
                  } else {
                     echo "<h3>Disculpanos, tu mensaje no pudo ser entregado</h3>";
                  }
               ?>
               <a class="button mt-xl-3" href="register.php">Volver</a>
            </div>
         </div>
      </div>
   </div>
</div>

<?php require_once 'footer_web.php'; ?>