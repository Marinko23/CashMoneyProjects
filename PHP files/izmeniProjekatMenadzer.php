<?php
session_start();
require_once("./db.php");
$ob = new OperacijeBaze();
// if ($ob->ulogaUseraPoId($_SESSION["auth"]) != 0) die(header("Location: index.php"));
$ob->izmeniProjekatMenadzer($_POST["naziv"], $_POST["lokacija"], $_POST["rok"], $_POST["id"]);
header("Location: menadzer.php");
?>
