<?php
session_start();

if (!isset($_SESSION['admin_email'])) {
    header('Location: adminLogin.php');
    exit();
}

include_once 'partials/head.php';
require_once 'controllers/Alert.php';
require_once 'controllers/user.php';

user::logout();
