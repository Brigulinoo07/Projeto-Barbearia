<?php
    require_once("banco.php");

    class Cadastro extends Banco {

        private $id;
        private $nome;
        private $data_nasc;
        private $cpf;
        private $email;
        private $senha;

        //Metodos Set
        public function setId($string){
            $this->id = $string;
        }
        public function setNomeCdst($string){
            $this->nome = $string;
        }
        public function setDataNascCdst($string){
            $this->dataNasc = $string;
        }
        public function setCpfCdst($string){
            $this->cpf = $string;
        }
        public function setEmailCdst($string){
            $this->email = $string;
        }
        public function setSenhaCdst($string){
            $this->senha = $string;
        }
        

        //Metodos Get
        public function getId(){
            return $this->id;
        }
        public function getNomeCdst(){
            return $this->nome;
        }
        public function getDataNascCdst(){
            return $this->dataNasc;
        }
        public function getCpfCdst(){
            return $this->cpf;
        }
        public function getEmailCdst(){
            return $this->email;
        }
        public function getSenhaCdst(){
            return $this->senha;
        }

        public function incluir(){
            return $this->setCadastros($this->getNomeCdst(),$this->getDataNascCdst(),$this->getCpfCdst(),$this->getEmailCdst(),$this->getSenhaCdst());
        }
        
        public function listar($id){
            return $this->getCadastros($id);
        }

        public function editar(){
            return $this->updateCadastros($this->getId(),$this->getNomeCdst(),$this->getDataNascCdst(),$this->getCpfCdst(),$this->getEmailCdst(),$this->getSenhaCdst());
        }

        public function excluir($id){
            return $this->deleteCadastros($id);
        }
    }
?>

