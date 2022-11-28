<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Cadastro - Style Barber Point</title>
        <link rel="icon" type="imagem/png" href="images/icon.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script>
            window.onload = function () 
            {
                document.form.txtNomeCdst.focus();
            }

            function mascara_cpf(){
                var cpf = document.getElementById('txtCpfCdst')
                if(cpf.value.length == 3 || cpf.value.length == 7) {
                    cpf.value += "."
                }
                else if(cpf.value.length == 11){
                    cpf.value += "-"
                }
            }

            function mascara_data(){
                var data = document.getElementById('txtDataNasCdst')
                if(data.value.length == 2 || data.value.length == 5) {
                    data.value += "/"
                }
            }
        </script>
    </head>

    <body>
        <header>
            <nav>
                <a class="logo2" href="index.php"><img src="images/logo_nav.png" class="logo" ></a>
            </nav>
        </header>

        <main>
            <div class="container">    
                <div class="colCadEAgen">            
                    <div class="divCenterForm">
                        <h1 class="h1Icones">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                            </svg>
                            Criar seu cadastro
                        </h1>
                        <p>Faça o cadastro na nossa barbearia para adquirir descontos que só cadastrados podem ter.</p>
                        <div class="container"> 
                            <div class="divForm">
                                <form method="post" action="controller/ControllerCadastro.php?funcao=cadastro" class="needs-validation" novalidate="" id="form"> 
                                    <p class="pForm">Preencha os dados abaixo.</p>         
                                    <div class="mb-3">
                                        <label for="txtNome" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="txtNomeCdst" name="txtNomeCdst" size="120" maxlength="120" placeholder="Insira seu nome completo" required="">
                                        <div class="invalid-feedback">
                                            Insira seu nome.
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="txtDataNasCdst" class="form-label">Data de nascimento</label>
                                        <input type="text" class="form-control" id="txtDataNasCdst" name="txtDataNasCdst" maxlength="10" placeholder="Insira sua data de nascimento" onkeyup="mascara_data()" required="">
                                        <div class="invalid-feedback">
                                            Insira a sua data de nascimento.
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="txtCpfCdst" class="form-label">CPF</label>
                                        <input type="text" class="form-control" id="txtCpfCdst" name="txtCpfCdst" size="14" maxlength="14" placeholder="Insira o seu CPF" onkeyup="mascara_cpf()" required="">
                                        <div class="invalid-feedback">
                                            Insira o seu CPF.
                                        </div>
                                    </div>

                                    <div class="mb-3">   
                                        <label for="txtEmailCdst" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="txtEmailCdst" name="txtEmailCdst" maxlength="90" placeholder="Insira o seu email (ex: nome@exemplo.com)" required="">            
                                        <div class="invalid-feedback">
                                            Insira o seu email(@gmail.com).    
                                        </div>     
                                    </div>  
                                    
                                    <div class="mb-3">
                                        <label for="txtSenhaCdst" class="form-label">Senha</label>
                                        <input type="password" class="form-control" id="txtSenhaCdst" name="txtSenhaCdst" size="20" maxlength="20" placeholder="Insira a sua senha" required="">
                                        <div class="invalid-feedback">
                                            Insira a sua senha.
                                        </div>
                                    </div>
        
                                    <div class="divBtnCdst">
                                        <button class="btn btn-outline-light" type="submit" >Cadastrar</button>
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
                                                        alert("Erro!!! Contém campos não preenchidos/campos preenchidos de maneira incorreta!");
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

                        <p>Já tem cadastro? <a class="linkCadastro" href="pags_login/login.php"><u>Entrar</u></a></p>
                    </div>
                </div>                  
            </div> 
        </main>
        <script src="js/mobile-navbar.js"></script>
    </body>
</html>