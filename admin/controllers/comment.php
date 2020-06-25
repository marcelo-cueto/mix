<?php
require_once 'admin/controllers/conectPDO.php';

Class Comment {
   private $id;
   private $coment;
   private $notice_id;
   private $datetime;

   public function __construct($data = []) {
      if (isset($data['id'])) $this->id = $data['id'];
      if (isset($data['coment'])) $this->coment = $data['coment'];
      if (isset($data['notice_id'])) $this->notice_id = $data['notice_id'];
      if (isset($data['datetime'])) $this->datetime = $data['datetime'];
   }

   public function getId() {
      return $this->id;
   }

   public function getComent() {
      return $this->coment;
   }

   public function getNoticeId() {
      return $this->notice_id;
   }

   public function getDatetime() {
      return $this->datetime;
   }

   public function setId($id) {
      $this->id = $id;
   }

   public function setComent($coment) {
      $this->coment = $coment;
   }

   public function setNotice_id($notice_id) {
      $this->notice_id = $notice_id;
   }

   public function setDatetime($datetime) {
      $this->datetime = $datetime;
   }

   public static function getAllComments() {
      global $conn;
      $comments = [];
      $query = $conn->prepare("SELECT * FROM coments");
      try {
         $query->execute();
         while ($info = $query->fetch(PDO::FETCH_ASSOC)){
            $comments[] = new comment($info);
         }
         return $comments;
      } catch(PDOException $e){
         return $e->getMessage();
      }
   }

   public static function getByNoticeId($nid) {
      global $conn;
      $comments = [];
      $query = $conn->prepare("SELECT * FROM coments WHERE notice_id = $nid");
      try {
         $query->execute();
         while ($info = $query->fetch(PDO::FETCH_ASSOC)){
            $comments[] = new comment($info);
         }
         return $comments;
      } catch(PDOException $e){
         return $e->getMessage();
      }
   }
}