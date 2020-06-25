<?php
require_once 'admin/controllers/conectPDO.php';

Class Notice {
   private $id;
   private $title;
   private $img;
   private $texto;
   private $dates;
   private $autor;
   private $tipo;

   public function __construct($data = []) {
      if (isset($data['id'])) $this->id = $data['id'];
      if (isset($data['title'])) $this->title = $data['title'];
      if (isset($data['img'])) $this->img = $data['img'];
      if (isset($data['texto'])) $this->texto = $data['texto'];
      if (isset($data['dates'])) $this->dates = $data['dates'];
      if (isset($data['autor'])) $this->autor = $data['autor'];
      if (isset($data['tipo'])) $this->tipo = $data['tipo'];
   }

   public function getId() {
      return $this->id;
   }

   public function getTitle() {
      return $this->title;
   }

   public function getImg() {
      return $this->img;
   }

   public function getTexto() {
      return $this->texto;
   }

   public function getDates() {
      return $this->dates;
   }

   public function getAutor() {
      return $this->autor;
   }

   public function getTipo() {
      return $this->tipo;
   }

   public function setId($id) {
      $this->id = $id;
   }

   public function setTitle($title) {
      $this->title = $title;
   }

   public function setImg($img) {
      $this->img = $img;
   }

   public function setTexto($texto) {
      $this->texto = $texto;
   }

   public function setDates($dates) {
      $this->dates = $dates;
   }

   public function setAutor($autor) {
      $this->autor = $autor;
   }

   public function setTipo($tipo) {
      $this->tipo = $tipo;
   }

   public static function getDefaultNotices() {
      global $conn;
      $notices = [];
      $query = $conn->prepare("SELECT * FROM notices WHERE tipo = 0");
      try {
         $query->execute();
         while ($info = $query->fetch(PDO::FETCH_ASSOC)){
            $notices[] = new notice($info);
         }
         return $notices;
      } catch(PDOException $e){
         return $e->getMessage();
      }
   }

   public static function getAllNotices() {
      global $conn;
      $notices = [];
      $query = $conn->prepare("SELECT * FROM notices");
      try {
         $query->execute();
         while ($info = $query->fetch(PDO::FETCH_ASSOC)){
            $notices[] = new notice($info);
         }
         return $notices;
      } catch(PDOException $e){
         return $e->getMessage();
      }
   }

   public static function getById($id) {
      global $conn;
      $query = $conn->prepare("SELECT * FROM notices WHERE id = $id LIMIT 1");
      try {
         $query->execute();
         $info = $query->fetch(PDO::FETCH_ASSOC);
         $notice = new notice($info);
         return $notice;
      } catch(PDOException $e){
         return $e->getMessage();
      }
   }
}