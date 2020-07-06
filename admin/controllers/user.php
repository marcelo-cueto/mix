<?php
require_once 'conectPDO.php';

class User
{
   private $id;
   private $uname;
   private $idnumber;
   private $admin;
   private $password;
   private $email;
   private $management;
   private $hiredate;
   private $birthdate;

   public function __construct($uname, $idnumber, $password, $admin = 0, $email, $management, $hiredate, $birthdate, $id = null)
   {
      $this->uname = $uname;
      $this->idnumber = $idnumber;
      $this->admin = $admin;
      $this->id = $id;
      $this->password = $password;
      $this->email = $email;
      $this->management = $management;
      $this->hiredate = $hiredate;
      $this->birthdate = $birthdate;
   }
   public function getId()
   {
      return $this->id;
   }
   public function getName()
   {
      return $this->uname;
   }
   public function getIdnumber()
   {
      return $this->idnumber;
   }
   public function getAdmin()
   {
      return $this->admin;
   }
   public function getPassword()
   {
      return $this->password;
   }
   public function setId($id)
   {
      $this->id = $id;
   }
   public function setName($uname)
   {
      $this->uname = $uname;
   }
   public function setLegajo($legajo)
   {
      $this->legajo = $legajo;
   }
   public function setAdmin($admin)
   {
      $this->admin = $admin;
   }
   public function setPassword($password)
   {
      $this->password = $password;
   }
   public function getEmail()
   {
      return $this->email;
   }
   public function setEmail($email)
   {
      $this->email = $email;
   }
   public function getManagement()
   {
      return $this->management;
   }
   public function setManagement($management)
   {
      $this->management = $management;
   }
   public function getHire()
   {
      return $this->hiredate;
   }
   public function setHire($hiredate)
   {
      $this->hiredate = $hiredate;
   }
   public function getBirth()
   {
      return $this->birthdate;
   }
   public function setBirth($birthdate)
   {
      $this->birthdate = $birthdate;
   }

   //**loguer**//
   public static function loger($email, $pass)
   {
      /*
      if ($_REQUEST['csrf_token'] != $_SESSION['csrf_token']['token']) {
         die('Acceso no permitido');
      }
      */
      global $conn;
      try {
         $query = $conn->prepare("SELECT * FROM users WHERE email = :email");
         $query->bindValue(':email', $email, PDO::PARAM_STR);
         $query->execute();
         $info = $query->fetch(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
         return $e->getMessage();
      }

      if (sha1($pass) === $info['pass']) {
         $_SESSION['admin_email'] = $info['email'];
         $_SESSION['admin_id'] = $info['id'];
         setcookie("email", $_SESSION['admin_email'], time() + 60 * 60 * 24 * 30);
         header('Location: admin.php');
         exit();
      } else {
         Alert::set_msg('Identificacion incorrecta', 'danger');
         header('Location: adminLogin.php');
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

   //**todos los usuarios**//
   public static function lista()
   {
      global $conn;
      try {
         $query = $conn->prepare("SELECT * FROM Users");
         $query->execute();
         $info = $query->fetchAll();
         return $info;
      } catch (PDOException $e) {
         return $e->getMessage();
      }  
   }

   //**Buscar Usuario por id**//
   public static function userById($id)
   {
      global $conn;
      try {
         $query = $conn->prepare("SELECT * FROM users WHERE id = :id");
         $query->bindValue(':id', $id, PDO::PARAM_INT);
         $query->execute();
         $info = $query->fetch(PDO::FETCH_ASSOC);
         return $info;
      } catch (PDOException $e) {
         return $e->getMessage();
      }
   }

   public static function existsByEmail($email)
   {
      global $conn;
      try {
         $query = $conn->prepare("SELECT * FROM users WHERE email = :email");
         $query->bindValue(':email', $email, PDO::PARAM_STR);
         $query->execute();
         $info = $query->fetch(PDO::FETCH_ASSOC);
         return $info;
      } catch (PDOException $e) {
         return $e->getMessage();
      }
   }

   public static function updateByEmail($email, $param1, $value1, $param2 = '', $value2 = '')
   {
      global $conn;
      try {
         $sql = "UPDATE users SET $param1 = :value1 ";
         if ($param2 != '' && $value2 != '') $sql .= ", $param2 = :value2 ";
         $sql .= "WHERE email = :email";
         $query = $conn->prepare($sql);
         $query->bindValue(':value1', $value1);
         if ($param2 != '' && $value2 != '') $query->bindValue(':value2', $value2);
         $query->bindValue(':email', $email, PDO::PARAM_STR);
         $query->execute();
         return;
      } catch (PDOException $e) {
         return $e->getMessage();
      }
   }

   public static function sendPassEmail($email, $clave)
   {
      $eol = PHP_EOL;
      $asunto = 'Modificación de clave administrador';
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
