<?php
	require_once("../../controller/ControllerCadastro.php");
	include('../protect.php');

	$controller = new ControllerCadastro();
	$resultado = $controller->excluir($_GET['id']);
?>