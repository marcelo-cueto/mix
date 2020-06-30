<?php
require_once 'admin/controllers/conectPDO.php';

class Suscriptor
{
   private $id;
   private $name;
   private $surname;
   private $email;
   private $type;
   private $pass;
   private $tel;
   private $profesion;
   private $sueldos;
   private $sociedades;
   private $monotributo;
   private $impuestos;
   private $matricula;
   private $autonomos;
   private $contabilidad;
   private $gestion;
   private $judiciales;
   private $certificaciones;
   private $otras;
   private $recomendado;
   private $comentario;

   public function __construct($data = [])
   {
      if (isset($data['id'])) $this->id = $data['id'];
      if (isset($data['name'])) $this->name = $data['name'];
      if (isset($data['surname'])) $this->surname = $data['surname'];
      if (isset($data['email'])) $this->email = $data['email'];
      if (isset($data['type'])) $this->type = $data['type'];
      if (isset($data['pass'])) $this->pass = $data['pass'];
      if (isset($data['tel'])) $this->tel = $data['tel'];
      if (isset($data['profesion'])) $this->profesion = $data['profesion'];
      if (isset($data['sueldos'])) $this->sueldos = $data['sueldos'];
      if (isset($data['sociedades'])) $this->sociedades = $data['sociedades'];
      if (isset($data['monotributo'])) $this->monotributo = $data['monotributo'];
      if (isset($data['impuestos'])) $this->impuestos = $data['impuestos'];
      if (isset($data['matricula'])) $this->matricula = $data['matricula'];
      if (isset($data['autonomos'])) $this->autonomos = $data['autonomos'];
      if (isset($data['contabilidad'])) $this->contabilidad = $data['contabilidad'];
      if (isset($data['gestion'])) $this->gestion = $data['gestion'];
      if (isset($data['judiciales'])) $this->judiciales = $data['judiciales'];
      if (isset($data['certificaciones'])) $this->certificaciones = $data['certificaciones'];
      if (isset($data['otras'])) $this->otras = $data['otras'];
      if (isset($data['recomendado'])) $this->recomendado = $data['recomendado'];
      if (isset($data['comentario'])) $this->comentario = $data['comentario'];
   }

   public function getId() { return $this->id; }

   public function getName() { return $this->name; }

   public function getSurname() { return $this->surname; }

   public function getEmail() { return $this->email; }

   public function getType() { return $this->type; }

   public function getPass() { return $this->pass; }

   public function getTel() { return $this->tel; }

   public function getProfesion() { return $this->profesion; }

   public function getSueldos() { return $this->sueldos; }

   public function getSociedades() { return $this->sociedades; }

   public function getMonotributo() { return $this->monotributo; }

   public function getImpuestos() { return $this->impuestos; }

   public function getMatricula() { return $this->matricula; }

   public function getAutonomos() { return $this->autonomos; }

   public function getContabilidad() { return $this->contabilidad; }

   public function getGestion() { return $this->gestion; }

   public function getJudiciales() { return $this->judiciales; }

   public function getCertificaciones() { return $this->certificaciones; }

   public function getOtras() { return $this->otras; }

   public function getRecomendado() { return $this->recomendado; }

   public function getComentario() { return $this->comentario; }

   public function setId($id) { $this->id = $id; }

   public function setName($name) { $this->name = $name; }

   public function setSurname($surname) { $this->surname = $surname; }

   public function setEmail($email) { $this->email = $email; }

   public function setType($type) { $this->type = $type; }

   public function setPass($pass) { $this->pass = $pass; }

   public function setTel($tel) { $this->tel = $tel; }

   public function setProfesion($profesion) { $this->profesion = $profesion; }

   public function setSueldos($sueldos) { $this->sueldos = $sueldos; }

   public function setSociedades($sociedades) { $this->sociedades = $sociedades; }

   public function setMonotributo($monotributo) { $this->monotributo = $monotributo; }

   public function setImpuestos($impuestos) { $this->impuestos = $impuestos; }

   public function setMatricula($matricula) { $this->matricula = $matricula; }

   public function setAutonomos($autonomos) { $this->autonomos = $autonomos; }

   public function setContabilidad($contabilidad) { $this->contabilidad = $contabilidad; }

   public function setGestion($gestion) { $this->gestion = $gestion; }

   public function setJudiciales($judiciales) { $this->judiciales = $judiciales; }

   public function setCertificaciones($certificaciones) { $this->certificaciones = $certificaciones; }

   public function setOtras($otras) { $this->otras = $otras; }

   public function setRecomendado($recomendado) { $this->recomendado = $recomendado; }

   public function setComentario($comentario) { $this->comentario = $comentario; }

   public static function loger($email, $pass)
   {
      /*
      if ($_REQUEST['csrf_token'] != $_SESSION['csrf_token']['token']) {
         die('Acceso no permitido');
      }
      */
      global $conn;
      $query = $conn->prepare("SELECT * FROM suscriptions WHERE email = '$email'");
      $query->execute();
      $info = $query->fetch(PDO::FETCH_ASSOC);

      if (sha1($pass) === $info['pass']) {
         $_SESSION['sus_email'] = $info['email'];
         $_SESSION['sus_id'] = $info['id'];
         setcookie("email", $_SESSION['sus_email'], time() + 60 * 60 * 24 * 30);
         header('Location: blog_web.php');
         exit();
      } else {
         Alert::set_msg('Identificacion incorrecta', 'danger');
         header('Location: suscriptors_login_web.php');
         exit();
      }
   }

   public static function logout()
   {
      session_unset();
      session_destroy();
      session_write_close();
      setcookie(session_name(), '', 0, '/');

      header('Location: index.php');
      exit();
   }

   /*
   public static function userById($id){
      global $conn;
      $query = $conn->prepare("SELECT * FROM users WHERE id = $id");
      $query->execute();
      $info=$query->fetch(PDO::FETCH_ASSOC);
      return $info;
    } */

    public static function existsByEmail($email){
      global $conn;
      $query = $conn->prepare("SELECT * FROM suscriptions WHERE email = '$email'");
      $query->execute();
      $info=$query->fetch(PDO::FETCH_ASSOC);
      return $info;
    }

    public static function updateByEmail($email, $param1, $value1, $param2 = '', $value2 = '') {
      global $conn;
      $sql = "UPDATE suscriptions SET $param1 = '$value1' ";
      if ($param2 != '' && $value2 != '') $sql .= ", $param2 = '$value2' ";
      $sql .= "WHERE email = '$email'";
      $query = $conn->prepare($sql);
      $query->execute();
      $info = $query->fetch();
      return $info;
    }

    public static function sendPassEmail($email, $clave) {
      $eol = PHP_EOL;
      $asunto = 'Modificación de clave suscriptor';
      $mensaje = 'Esta es la clave provisoria que deberá ingresar:' . $eol;
      $mensaje .= $clave;
      $header = 'From: no-responder@enlaceprofesional.com.ar' . $eol;
      $header .= 'Reply-To: info@enlaceprofesional.com.ar' . $eol;
      $header .= 'X-Mailer: PHP/' . phpversion();
      /*
      $mail = mail($email, $asunto, $mensaje, $header);
      if ($mail) {
         Alert::set_msg('Enviada con éxito', 'success');
      } else {
         Alert::set_msg('Disculpanos. No se pudo enviar', 'danger');
      }
      */
      return;
    }
}
