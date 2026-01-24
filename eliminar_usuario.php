<?php
require "conexion.php";
$id = $_GET['id'];

$pdo->prepare("DELETE FROM usuarios WHERE id=?")->execute([$id]);

header("Location: admin.php");
