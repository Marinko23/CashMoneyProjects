<?php
session_start();
require_once("./db.php");
$ob = new OperacijeBaze();
if ($ob->ulogaUseraPoId($_SESSION["auth"]) != 0) die(header("Location: index.php"));
$ob->izmeniStavkuZaposleni($_POST["status"], $_POST["komentar"], $_POST["id"]);
header("Location: zaposleni.php");
?>
