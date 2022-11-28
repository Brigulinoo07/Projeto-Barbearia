<?php
    //timezone
    date_default_timezone_set('America/Sao_Paulo');

    // conexão com o banco de dados
    define('BD_SERVIDOR','localhost');
    define('BD_USUARIO','root');
    define('BD_SENHA','');
    define('BD_BANCO','projetobarbearia');

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "projetobarbearia";
    $conn = new PDO("mysql:host=$host;dbname=".$dbname, $user, $pass);

    $mysqlii = new mysqli($host, $user, $pass, $dbname);
    $pdo = new PDO("mysql:dbname=projetobarbearia;host=localhost", "root", "");

    if($mysqlii->error) {
        die("Falha ao conectar ao banco de dados: " . $mysqlii->error);
    }

    class Banco{

        protected $mysqli;
        private $cadastro;
        private $agendamento;
        private $contato;

        public function __construct(){
            $this->conexao();
        }

        private function conexao(){
            $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
        }

        /*Funcoes do cadastro*/

            public function setCadastros($nome,$data_nasc,$cpf,$email,$senha){
                $stmt = $this->mysqli->prepare("INSERT INTO cadastros (`nome`, `data_nasc`, `cpf`, `email`, `senha`) VALUES (?,?,?,?,?);");
                $stmt->bind_param("sssss",$nome,$data_nasc,$cpf,$email,$senha);
                if( $stmt->execute() == TRUE){
                    return true ;
                }else{
                    return false;
                }
            }

            public function getCadastros($id){
                try{
                    if(isset($id) && $id > 0){
                        $stmt = $this->mysqli->query("SELECT * FROM cadastros WHERE id = '" .$id . "';");
                    }else{
                        $stmt = $this->mysqli->query("SELECT * FROM cadastros;");
                    }

                    $lista = $stmt->fetch_all(MYSQLI_ASSOC);
                    $f_lista = array();
                    $i = 0;
                    foreach ($lista as $l){
                        $f_lista[$i]['id'] = $l['id'];
                        $f_lista[$i]['nome'] = $l['nome'];
                        $f_lista[$i]['data_nasc'] = $l['data_nasc'];
                        $f_lista[$i]['cpf'] = $l['cpf'];
                        $f_lista[$i]['email'] = $l['email'];
                        $f_lista[$i]['senha'] = $l['senha'];
                        $i++;
                    }
                    return $f_lista;
                } catch(Exception $e) {
                    echo "Ocorreu um erro ao tentar Buscar Todos." .$e;
                }
            }

            public function updateCadastros($id,$nome,$data_nasc,$cpf,$email,$senha){
                $stmt = $this->mysqli->query("UPDATE  cadastros  SET `nome` = '" . $nome . "', `data_nasc` = '" . $data_nasc . "', `cpf` = '" . $cpf . "', `email` = '" . $email . "',`senha` = '" . $senha . "' WHERE `cadastros`.`id` = " . $id . ";");
                if( $stmt > 0){
                    return true;
                }else{
                    return false;
                }
            }

            public function deleteCadastros($id){
                $stmt = $this->mysqli->query("DELETE FROM cadastros WHERE `id` =  '" . $id . "';");
                if( $stmt > 0){
                    return true ;
                }else{
                    return false;
                }
            }
            
        /*Funcoes do cadastro*/

        /*Funcoes do contato*/
        
            public function setContatos($nomeCtt,$emailCtt,$assuntoCtt,$msgCtt){
                $stmt = $this->mysqli->prepare("INSERT INTO contatos (`nome`, `email`, `assunto`, `msg`) VALUES (?,?,?,?);");
                $stmt->bind_param("ssss",$nomeCtt,$emailCtt,$assuntoCtt,$msgCtt);
                if( $stmt->execute() == TRUE){
                    return true ;
                }else{
                    return false;
                }    
            }

            public function getContatos($idCtt){
                try{
                    if(isset($idCtt) && $idCtt > 0){
                        $stmt = $this->mysqli->query("SELECT * FROM contatos WHERE id = '" .$idCtt . "';");
                    }else{
                        $stmt = $this->mysqli->query("SELECT * FROM contatos;");
                    }

                    $lista = $stmt->fetch_all(MYSQLI_ASSOC);
                    $f_lista = array();
                    $i = 0;
                    foreach ($lista as $l){
                        $f_lista[$i]['idCtt'] = $l['id'];
                        $f_lista[$i]['nomeCtt'] = $l['nome'];
                        $f_lista[$i]['emailCtt'] = $l['email'];
                        $f_lista[$i]['assuntoCtt'] = $l['assunto'];
                        $f_lista[$i]['msgCtt'] = $l['msg'];
                        $i++;
                    }
                    return $f_lista;
                } catch(Exception $e) {
                    echo "Ocorreu um erro ao tentar Buscar Todos." .$e;
                }
            }

            public function deleteContatos($idCtt){
                $stmt = $this->mysqli->query("DELETE FROM contatos WHERE `id` =  '" . $idCtt . "';");
                if( $stmt > 0){
                    return true ;
                }else{
                    return false;
                }
            }

        /*Funcoes do contato*/
    }    
?>
