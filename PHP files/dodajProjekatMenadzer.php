<?php
session_start();
require_once("./db.php");
$ob = new OperacijeBaze();
// if ($ob->ulogaUseraPoId($_SESSION["auth"]) != 0) die(header("Location: index.php"));
$ob->dodajProjekatMenadzer($_POST["naziv"], $_POST["lokacija"], $_POST["rok"]);
header("Location: menadzer.php");
?>
