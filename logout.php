<?php
include ("db-sett/db-connect.php");

session_start();
session_destroy();
header('Location: '.$path.'/intro.php');
die();
?>