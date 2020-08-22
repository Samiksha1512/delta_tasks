<?php
session_start();
$questionno=$_GET['qno'];
$value1=$_GET['value1'];
$_SESSION["answer"][$questionno]=$value1;

?>