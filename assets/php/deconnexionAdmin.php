<?php
session_start();

$_SESSION['admin'] = "";

// session_destroy();

header('location:./../../admin/connectAdmin.php');
