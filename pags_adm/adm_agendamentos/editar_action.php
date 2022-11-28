<?php
  include_once '../../model/banco.php'; 
  include('../protect.php');

  $id = filter_input(INPUT_POST, 'id');
  $cabelo = filter_input(INPUT_POST, 'cabelo');
  $barba = filter_input(INPUT_POST, 'barba');
  $sobrancelha = filter_input(INPUT_POST, 'sobrancelha');
  $progressiva = filter_input(INPUT_POST, 'progressiva');
  $coloracao = filter_input(INPUT_POST, 'coloracao');
  $hidratacao = filter_input(INPUT_POST, 'hidratacao');
  $nome = filter_input(INPUT_POST, 'txtNomeAgen');
  $cpf = filter_input(INPUT_POST, 'txtCpfAgen');
  $celular = filter_input(INPUT_POST, 'txtCelularAgen');
  $data = filter_input(INPUT_POST, 'dtDataAgen');
  $hora = filter_input(INPUT_POST, 'tmHoraAgen');

  if($id && $nome && $cpf && $celular && $data && $hora){
    $sql = $pdo->prepare("UPDATE agendamentos SET cabelo = :cabelo, barba = :barba, sobrancelha = :sobrancelha, progressiva = :progressiva, coloracao = :coloracao,
    hidratacao = :hidratacao, nome = :nome, cpf = :cpf, celular = :celular, data = :data, hora = :hora WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':cabelo', $cabelo);
    $sql->bindValue(':barba', $barba);
    $sql->bindValue(':sobrancelha', $sobrancelha);
    $sql->bindValue(':progressiva', $progressiva);
    $sql->bindValue(':coloracao', $coloracao);
    $sql->bindValue(':hidratacao', $hidratacao);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':cpf', $cpf);
    $sql->bindValue(':celular', $celular);
    $sql->bindValue(':data', $data);
    $sql->bindValue(':hora', $hora);
    $sql->execute();
    header("Location: ../adm_agendamentos/consultaAgendamento.php");
    exit;
  }else{
      echo "<script>alert('Erro: Não foi possível realizar o agendamento.');</script>";
      header("Location: ../adm_agendamentos/consultaAgendamento.php");
      exit;
  }
?>