<?php
if (empty($_POST['mail']) || empty($_POST['reason']) || empty($_POST['message'])) {
   header('Location: prueba_form.php');
   exit();
}

$nombre = $_POST['mail'];
$email = 'martinezmatiasat@gmail.com';
$asunto = $_POST['reason'];
$mensaje = $_POST['mensaje'];
$eol = PHP_EOL;
$header = 'From: webmaster@example.com'.$eol.
         'Reply-To: webmaster@example.com'.$eol.
         'X-Mailer: PHP/'.phpversion();
$mail = mail($email, $asunto, $mensaje, $header);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Prueba mail</title>
</head>
<body>
   <?php
      if ($mail) {
         echo "<p>Tu mensaje fue enviado con exito</p>";
      }
   ?>
</body>
</html>


