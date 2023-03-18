<?php
session_start();
require_once("./db.php");
$ob = new OperacijeBaze();
if ($ob->ulogaUseraPoId($_SESSION["auth"]) != 1) die(header("Location: index.php"));
$ob->ukloniProjekat($_GET["id"]);
header("Location: menadzer.php");
?>
