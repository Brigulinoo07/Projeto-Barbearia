<?php
    require_once("banco.php");

    class Contato extends Banco {

        private $idCtt;
        private $nomeCtt;
        private $emailCtt;
        private $assuntoCtt;
        private $msgCtt;

        //Metodos Set
        public function setIdCtt($string){
            $this->idCtt = $string;
        }
        public function setNomeCtt($string){
            $this->nomeCtt = $string;
        }
        public function setEmailCtt($string){
            $this->emailCtt = $string;
        }
        public function setAssuntoCtt($string){
            $this->assuntoCtt = $string;
        }
        public function setMsgCtt($string){
            $this->msgCtt = $string;
        }
        

        //Metodos Get
        public function getIdCtt(){
            return $this->idCtt;
        }
        public function getNomeCtt(){
            return $this->nomeCtt;
        }
        public function getEmailCtt(){
            return $this->emailCtt;
        }
        public function getAssuntoCtt(){
            return $this->assuntoCtt;
        }
        public function getMsgCtt(){
            return $this->msgCtt;
        }
        

        public function incluir(){
            return $this->setContatos($this->getNomeCtt(),$this->getEmailCtt(),$this->getAssuntoCtt(),$this->getMsgCtt());
        }
        
        public function listar($idCtt){
            return $this->getContatos($idCtt);
        }

        public function excluir($idCtt){
            return $this->deleteContatos($idCtt);
        }
    }
?>

