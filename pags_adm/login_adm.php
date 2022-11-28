<?php
    include('../model/banco.php');

    if(isset($_POST['usuario']) || isset($_POST['senha'])) {

        if(strlen($_POST['usuario']) == 0) {
            echo "Preencha seu e-mail";
        } else if(strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha";
        } else {

            $usuario = $mysqlii->real_escape_string($_POST['usuario']);
            $senha = $mysqlii->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM usuario_adm WHERE usuario = '$usuario' AND senha = '$senha'";
            $sql_query = $mysqlii->query($sql_code) or die("Falha na execução do código SQL: " . $mysqlii->error);

            $quantidade = $sql_query->num_rows;

            if($quantidade == 1) {
                
                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: home_adm.php");

            } else {
                echo "<script>alert('Falha ao logar! E-mail ou senha incorretos.');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login - Style Barber Point</title>
        <link rel="icon" type="imagem/png" href="../images/icon.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script>
            window.onload = function () 
            {
                document.form.emailLgn.focus();
            }
        </script>
    </head>

    <body>
        <header>
            <nav>
                <a class="logo2" href="../index.php"><img src="../images/logo_nav.png" class="logo" ></a>
            </nav>
        </header>

        <main>
            <div class="container">    
                <div class="colLogin">            
                    <div class="divCenterForm">
                        <h1 class="h1Icones">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                            </svg>
                            Login do administrador
                        </h1>
                        <p>Faça o login para gerenciar os dados.</p>
                        <div class="container"> 
                            <div class="divForm">
                                <form class="needs-validation" method="POST"  novalidate="" id="form" name="form" > 
                                    <p class="pForm">Preencha os dados abaixo.</p>         
                                
                                    <div class="mb-3">   
                                        <label for="usuario" class="form-label">Usuário</label>
                                        <input type="text" class="form-control" id="usuario" name="usuario" maxlength="16"  required="">            
                                        <div class="invalid-feedback">
                                            Insira o usuário.    
                                        </div>     
                                    </div>   

                                    <div class="mb-3">
                                        <label for="senha" class="form-label">Senha</label>
                                        <input type="password" class="form-control" id="senha" name="senha" size="30" maxlength="11" required="">
                                        <div class="invalid-feedback">
                                            Insira a sua senha.
                                        </div>
                                    </div>
                                        
                                    <div class="divBtnLgn">
                                        <button class="btn btn-outline-light" type="submit">Entrar</button>
                                    </div>

                                    <script>
                                        (function () 
                                        {
                                            'use strict'
                                            var forms = document.querySelectorAll('.needs-validation')
                                            Array.prototype.slice.call(forms)
                                                .forEach(function (form) 
                                                {
                                                    form.addEventListener('submit', function (event) 
                                                    {
                                                        if (!form.checkValidity()) 
                                                        {
                                                            event.preventDefault()
                                                            event.stopPropagation()
                                                            alert("Erro!!! Contém campos não preenchidos.");
                                                        }
                                
                                                        else
                                                        {
                                                            alert("Enviado com sucesso!");
                                                        }
                                    
                                                        form.classList.add('was-validated')
                                                    }, false)
                                
                                                })
                                        })()
                                    </script>      
                                </form>
                            </div>
                        </div>
                        
                        <div class="col">
                            &nbsp;
                        </div>

                        <p>Entrar como <a class="linkCadastro" href="../pags_login/login.php"><u>usuário</u></a></p>
                    </div>
                </div>                  
            </div> 
        </main>
        <script src="../js/mobile-navbar.js"></script>
    </body>
</html>


