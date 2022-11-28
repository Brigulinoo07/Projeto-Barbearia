<?php
	require_once("../../controller/ControllerContato.php");
	include('../protect.php');

	$controller = new ControllerContato();
	$resultado = $controller->excluir($_GET['id']);
?>