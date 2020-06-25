<?php
session_start();
require_once 'admin/controllers/conectPDO.php';
header('Location: home_web.php');
exit();