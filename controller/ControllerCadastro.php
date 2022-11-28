<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once("$root/siteBarbearia/model/cadastro.php");

    class ControllerCadastro{

        private $cadastro;

        public function __construct(){
            $this->cadastro = new Cadastro();
            if(isset($_GET['funcao']) && $_GET['funcao'] == "cadastro"){
                $this->incluir();
            }else if(isset($_GET['funcao']) && $_GET['funcao'] == "editar"){
                $this->editar($_GET['id']);
            }
        }

        private function incluir(){                                              
            $this->cadastro->setNomeCdst($_POST['txtNomeCdst']);
            $this->cadastro->setDataNascCdst($_POST['txtDataNasCdst']);
            $this->cadastro->setCpfCdst($_POST['txtCpfCdst']);
            $this->cadastro->setEmailCdst($_POST['txtEmailCdst']);
            $this->cadastro->setSenhaCdst($_POST['txtSenhaCdst']);
            $result = $this->cadastro->incluir();
            if($result >= 1){
                echo "<script>alert('Registro incluído com sucesso!');document.location='../agendamentoCliente.php'</script>";
            }else{
                echo "<script>alert('Erro ao gravar registro!');</script>";
            }
        }

        public function listar ($id){
            return $result = $this->cadastro->listar($id);
        }

        private function editar($id){
            $this->cadastro->setId($id);
            $this->cadastro->setNomeCdst($_POST['txtNomeCdst']);
            $this->cadastro->setDataNascCdst($_POST['txtDataNasCdst']);
            $this->cadastro->setCpfCdst($_POST['txtCpfCdst']);
            $this->cadastro->setEmailCdst($_POST['txtEmailCdst']);
            $this->cadastro->setSenhaCdst($_POST['txtSenhaCdst']);
            $result = $this->cadastro->editar();
            if($result >= 1){
                echo "<script>alert('Registro alterado com sucesso!');document.location='../pags_adm/adm_cadastros/consultaCadastro.php'</script>";
            }else{
                echo "<script>alert('Erro ao alterar registro!');</script>";
            }
        }

        public function excluir($id){
            $result = $this->cadastro->excluir($id);
            if($result >= 1){
                echo "<script>alert('Registro excluido com sucesso!');document.location='../adm_cadastros/consultaCadastro.php'</script>";
            }else{
                echo "<script>alert('Erro ao excluir o registro!');</script>";
            }
        }
    }
    new ControllerCadastro();
?>