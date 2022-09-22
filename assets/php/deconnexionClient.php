<?php
session_start();

$_SESSION['client'] = "";

// session_destroy();

// header('location:./../../admin/connectAdmin.php');
header('location:./../../index.php');
