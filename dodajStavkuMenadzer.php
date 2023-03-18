<?php
session_start();
require_once("./db.php");
$ob = new OperacijeBaze();
if ($ob->ulogaUseraPoId($_SESSION["auth"]) != 1) die(header("Location: index.php"));
$ob->dodajStavkuMenadzer($_POST["dodeljeno"], $_POST["id"], $_POST["naziv"], $_POST["status"], $_POST["detalji"], $_POST["komentar"]);
header("Location: menadzer.php");
?>