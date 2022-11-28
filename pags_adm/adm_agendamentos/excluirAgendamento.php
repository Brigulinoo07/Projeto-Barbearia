<?php
    include_once '../../model/banco.php'; 
    include('../protect.php');

    $id = filter_input(INPUT_GET, 'id');

    if($id){
        $sql= $pdo->prepare("DELETE FROM agendamentos WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    header("Location: consultaAgendamento.php");

?>

