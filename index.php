<?php
session_start();

require_once 'controllers/Csrf.php';
$csrf = new Csrf();

header('Location: adminLogin.php');
exit();