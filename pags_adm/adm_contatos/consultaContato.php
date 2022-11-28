<?php
    require_once("../../controller/ControllerContato.php");
    include('../protect.php');
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
                if (confirm("Deseja apagar a mensagem de contato?")) {
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
                    <li><a href="../adm_agendamentos/consultaAgendamento.php">Agendamentos</a></li>
                    <li><a href="consultaContato.php">Contato</a></li>
                    <ul class="nav-icon">
                        <li>
                            <div class="dropdown text-end">
                                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../../images/user.png" alt="mdo" width="32" height="32" class="rounded-circle">
                                </a>
                                <ul class="dropdown-menu text-small" style="">
                                    <li><a class="dropdown-item" href="../logout.php">Sair</a></li>
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
                            <h3>Consultar mensagens de contato dos clientes</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Assunto</th>
                                        <th scope="col">Msg</th>
                                    </tr>
                                </thead>
                                <tbody id="TabelaData">
                                    <?php
                                        $controller = new ControllerContato();
                                        $resultado = $controller->listar(0);
                                        for($i=0;$i<count($resultado);$i++){
                                    ?>
                                    <tr>
                                        <td scope="col"><?php echo $resultado[$i]['nomeCtt']; ?></td>
                                        <td scope="col"><?php echo $resultado[$i]['emailCtt']; ?></td>
                                        <td scope="col"><?php echo $resultado[$i]['assuntoCtt']; ?></td>
                                        <td scope="col">
                                            <textarea class="form-control" maxlength="300" rows="3" required="" readonly><?php echo $resultado[$i]['msgCtt']; ?></textarea>   
                                        </td>
                                        <td scope="col">
                                            <button type="button" class="btn btn-dark" onclick="javascript:confirmDelete('excluirContato.php?id=<?php echo $resultado[$i]['idCtt']; ?>')" style="width: 72px;">Excluir</button>
                                        </td>
                                    </tr>
                                    <?php        
                                    }    
                                    ?>
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