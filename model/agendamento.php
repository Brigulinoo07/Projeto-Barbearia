<?php
require_once("banco.php");

class Agendamento extends Banco {

    /*$dataAgen
    $horaAgen
    $Nome
    $DataNasc
    $Cpf
    $cidade
    $estado*/

    private $idAgen;
    private $cabelo;
    private $barba;
    private $sobrancelha;
    private $progressiva;
    private $coloracao;
    private $hidratacao;
    private $nomeAgen;
    private $cpfAgen;
    private $celularAgen;
    private $dataAgen;
    private $horaAgen;

    //Metodos Set
    public function setIdAgen($string){
        $this->idAgen = $string;
    }
    public function setCabelo($string){
        $this->cabelo = $string;
    }
    public function setBarba($string){
        $this->barba = $string;
    }
    public function setSobrancelha($string){
        $this->sobrancelha = $string;
    }
    public function setProgressiva($string){
        $this->progressiva = $string;
    }
    public function setColoracao($string){
        $this->coloracao = $string;
    }
    public function setHidratacao($string){
        $this->hidratacao = $string;
    }
    public function setNomeAgen($string){
        $this->nomeAgen = $string;
    }
    public function setCpfAgen($string){
        $this->cpfAgen = $string;
    }
    public function setCelularAgen($string){
        $this->celularAgen = $string;
    }  
    public function setDataAgen($string){
        $this->dataAgen = $string;
    }
    public function setHoraAgen($string){
        $this->horaAgen = $string;
    }
    

    //Metodos Get
    public function getIdAgen(){
        return $this->idAgen;
    }
    public function getCabelo(){
        return $this->cabelo;
    }
    public function getBarba(){
        return $this->barba;
    }
    public function getSobrancelha(){
        return $this->sobrancelha;
    }
    public function getProgressiva(){
        return $this->progressiva;
    }
    public function getColoracao(){
        return $this->coloracao;
    }
    public function getHidratacao(){
        return $this->hidratacao;
    }
    public function getNomeAgen(){
        return $this->nomeAgen;
    }
    public function getCpfAgen(){
        return $this->cpfAgen;
    }
    public function getCelularAgen(){
        return $this->celularAgen;
    }
    public function getDataAgen(){
        return $this->dataAgen;
    }
    public function getHoraAgen(){
        return $this->horaAgen;
    }
    
    /*
    public function incluir(){
        return $this->setAgendamentos($this->getCabelo(),$this->getBarba(),$this->getSobrancelha(),$this->getProgressiva(),$this->getColoracao(),$this->getHidratacao(),$this->getNomeAgen(),$this->getCpfAgen(),$this->getCelularAgen(),$this->getDataAgen(),$this->getHoraAgen());
    }*/
    
    public function listar($idAgen){
    	return $this->getAgendamentos($idAgen);
    }

    public function editar(){
        return $this->updateAgendamentos($this->getIdAgen(),$this->getCabelo(),$this->getBarba(),$this->getSobrancelha(),$this->getProgressiva(),$this->getColoracao(),$this->getHidratacao(),$this->getNomeAgen(),$this->getCpfAgen(),$this->getCelularAgen(),$this->getDataAgen(),$this->getHoraAgen());
    }

    public function excluir($idAgen){
        return $this->deleteAgendamentos($idAgen);
    }
}
?>

