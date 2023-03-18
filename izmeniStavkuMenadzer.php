<?php
session_start();
require_once("./db.php");
$ob = new OperacijeBaze();
// if ($ob->ulogaUseraPoId($_SESSION["auth"]) != 0) die(header("Location: index.php"));
$ob->izmeniStavkuMenadzer($_POST["dodeljeno"], $_POST["naziv"], $_POST["status"], $_POST["detalji"], $_POST["komentar"], $_POST["id"]);
header("Location: menadzer.php");
?>