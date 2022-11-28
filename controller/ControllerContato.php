<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once("$root/siteBarbearia/model/contato.php");

    class ControllerContato{

        private $contato;

        public function __construct(){
            $this->contato = new Contato();
            if(isset($_GET['funcao']) && $_GET['funcao'] == "contato"){
                $this->incluir();
            }else if(isset($_GET['funcao']) && $_GET['funcao'] == "editar"){
                $this->editar($_GET['id']);
            }
        }

        private function incluir(){                                              
            $this->contato->setNomeCtt($_POST['txtNomeCtt']);
            $this->contato->setEmailCtt($_POST['txtEmailCtt']);
            $this->contato->setAssuntoCtt($_POST['cboTipoMSG']);
            $this->contato->setMsgCtt($_POST['txtMsgCtt']);
            $result = $this->contato->incluir();
            if($result >= 1){
                echo "<script>alert('Mensagem enviada com sucesso!');document.location='../index.php'</script>";
            }else{
                echo "<script>alert('Erro ao enviar mensagem!');</script>";
            }
        }

        public function listar ($idCtt){
            return $result = $this->contato->listar($idCtt);
        }

        public function excluir($idCtt){
            $result = $this->contato->excluir($idCtt);
            if($result >= 1){
                echo "<script>alert('Mensagem excluida com sucesso!');document.location='../adm_contatos/consultaContato.php'</script>";
            }else{
                echo "<script>alert('Erro ao excluir a mensagem!');</script>";
            }
        }
    }
    new ControllerContato();
?>