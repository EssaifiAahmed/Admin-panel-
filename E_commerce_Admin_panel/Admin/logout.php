<?php
include 'database.php'; 
require 'session.php';
Session::start();
Session::destroy();
header('Location:../index.php');
?>