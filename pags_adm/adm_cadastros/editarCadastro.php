<?php
  require_once("../../controller/ControllerCadastro.php");
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
          <li><a href="consultaCadastro.php">Cadastros</a></li>
          <li><a href="../adm_agendamentos/consultaAgendamento.php">Agendamentos</a></li>
          <li><a href="../adm_contatos/consultaContato.php">Contato</a></li>
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
        <div class="colCadEAgen">            
          <div class="divCenterForm">
            <h1 class="h1Icones">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
              </svg>
               Editando o cadastro
            </h1>
            <div class="container"> 
              <div class="divForm">
                <?php
                  $controller = new ControllerCadastro();
                  $resultado = $controller->listar($_GET['id']);
                ?>
                <form method="post" action="../../controller/ControllerCadastro.php?funcao=editar&id=<?php echo $resultado[0]['id']; ?>" class="needs-validation" novalidate="" id="form"> 
                  <p class="pForm">Preencha os dados abaixo.</p>                                        
                  <div class="mb-3">
                    <label for="txtNome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="txtNomeCdst" name="txtNomeCdst" size="120" maxlength="120" placeholder="Insira seu nome completo" required="" value="<?php echo $resultado[0]['nome']; ?>">
                    <div class="invalid-feedback">
                      Insira seu nome.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="txtDataNasCdst" class="form-label">Data de nascimento</label>
                    <input type="text" class="form-control" id="txtDataNasCdst" name="txtDataNasCdst" maxlength="10" placeholder="Insira sua data de nascimento" onkeyup="mascara_data()" required="" value="<?php echo $resultado[0]['data_nasc']; ?>">
                    <div class="invalid-feedback">
                      Insira a sua data de nascimento.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="txtCpfCdst" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="txtCpfCdst" name="txtCpfCdst" size="14" maxlength="14" placeholder="Insira o seu CPF" onkeyup="mascara_cpf()" required="" value="<?php echo $resultado[0]['cpf']; ?>">
                    <div class="invalid-feedback">
                      Insira o seu CPF.
                    </div>
                  </div>

                  <div class="mb-3">   
                      <label for="txtEmailCdst" class="form-label">Email</label>
                      <input type="email" class="form-control" id="txtEmailCdst" name="txtEmailCdst" maxlength="90" placeholder="Insira o seu email (ex: nome@exemplo.com)" required="" value="<?php echo $resultado[0]['email']; ?>">            
                      <div class="invalid-feedback">
                        Insira o seu email.    
                      </div>     
                  </div>  
                                
                  <div class="mb-3">
                      <label for="txtSenhaCdst" class="form-label">Senha</label>
                      <input type="password" class="form-control" disabled id="txtSenhaCdst" name="txtSenhaCdst" size="20" maxlength="20" placeholder="Insira a sua senha" required="" value="<?php echo $resultado[0]['senha']; ?>">
                      <div class="invalid-feedback">
                        Insira a sua senha.
                      </div>
                  </div>
     
                  <div class="divBtnCdst">
                    <button class="btn btn-outline-light" type="submit" >Editar</button>
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

          </div>
        </div>                  
      </div> 
    </main>
    <script src="../../js/mobile-navbar.js"></script>
  </body>
</html>