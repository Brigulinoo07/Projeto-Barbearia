<?php
    include_once '../../model/banco.php'; 
    include('../protect.php');

    $lista = [];
    $sql = $pdo->query ('SELECT * FROM agendamentos');
    if($sql->rowCount() > 0){
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Editando Cadastro de Usuários</title> 
        <link rel="icon" type="imagem/png" href="../../images/icon.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/style.css" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script>
            function confirmDelete(delUrl) {
                if (confirm("Deseja apagar o agendamento?")) {
                    document.location = delUrl;
                }  
            }
	    </script>
    </head>

    <body>
        <header>
            <nav>
                <a class="logo" href="../home_adm.php"><img src="../../images/logo_nav.png" class="logo" ></a>
                <div class="mobile-menu">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
                <ul class="nav-list">
                    <li><a href="../adm_cadastros/consultaCadastro.php">Cadastros</a></li>
                    <li><a href="consultaAgendamento.php">Agendamentos</a></li>
                    <li><a href="../adm_contatos/consultaContato.php">Contato</a></li>
                    <ul class="nav-icon">
                        <li>
                            <div class="dropdown text-end">
                                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../../images/user.png" alt="mdo" width="32" height="32" class="rounded-circle">
                                </a>
                                <ul class="dropdown-menu text-small" style="">
                                <li><a class="dropdown-item" href="../logout.php">Entrar</a></li>
                                </ul>
                            </div>
                        </li>          
                    </ul>                           
                </ul>            
            </nav>
        </header>            

        <main>
            <div class="container">                                       
                <div class="row">

                    <div class="col">
                        &nbsp;
                    </div>

                    <div class="row">
                        <div class="col">
                            <h3>Consultar agendamentos dos clientes</h3>
                            <table class="table">
                                <thead>
                                    <tr>                                      
                                        <th scope="col">Nome</th>
                                        <th scope="col">CPF</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Hora</th>
                                        <th scope="col">Cabelo</th>
                                        <th scope="col">Barba</th>
                                        <th scope="col">Sobrancelha</th>
                                        <th scope="col">Progressiva</th>
                                        <th scope="col">Coloração</th>
                                        <th scope="col">Hidratação</th>
                                    </tr>
                                </thead>
                                <tbody id="TabelaData">
                                    <?php foreach ($lista as $agendamento): ?>
                                        <tr>
                                            <td scope="col"><?=$agendamento['nome']; ?></td>
                                            <td scope="col"><?=$agendamento['cpf']; ?></td>
                                            <td scope="col"><?=$agendamento['celular']; ?></td>
                                            <td scope="col"><?=$agendamento['data']; ?></td>
                                            <td scope="col"><?=$agendamento['hora']; ?></td>
                                            <td scope="col"><?=$agendamento['cabelo']; ?></td>
                                            <td scope="col"><?=$agendamento['barba']; ?></td>
                                            <td scope="col"><?=$agendamento['sobrancelha']; ?></td>
                                            <td scope="col"><?=$agendamento['progressiva']; ?></td>
                                            <td scope="col"><?=$agendamento['coloracao']; ?></td>
                                            <td scope="col"><?=$agendamento['hidratacao']; ?></td>
                                            <td scope="col">
                                                <a href="editarAgendamento.php?id=<?=$agendamento['id'];?>"><button type="button" class="btn btn-dark">Editar</button></a>
                                                <a><button type="button" class="btn btn-dark" onclick="javascript:confirmDelete('excluirAgendamento.php?id=<?=$agendamento['id'];?>')">Excluir</button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="../../js/mobile-navbar.js"></script>
    </body>
</html>