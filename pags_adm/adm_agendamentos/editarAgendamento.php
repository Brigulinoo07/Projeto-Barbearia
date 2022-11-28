<?php
  include_once '../../model/banco.php'; 
  include('../protect.php');
    
  $agendamento = [];
  $id = filter_input(INPUT_GET, 'id');
  if($id){
    $sql = $pdo->prepare("SELECT * FROM agendamentos WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql-> rowCount() > 0){
      $agendamento = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
      echo "<script>alert('Erro: Não foi possível realizar o agendamento.');</script>";
      exit;
    }
  }else{
    echo "<script>alert('Erro: Não foi possível realizar o agendamento.');</script>";
  }

  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agendamento - Style Barber Point</title>
    <link rel="icon" type="imagem/png" href="../../images/icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
      window.onload = function () 
      {
        document.form.txtNomeAgen.focus();
      }

      function mascara_cpf(){
        var cpf = document.getElementById('txtCpfAgen')
        if(cpf.value.length == 3 || cpf.value.length == 7) {
          cpf.value += "."
        }
        else if(cpf.value.length == 11){
          cpf.value += "-"
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
          <li><a href="../adm_contatos/consultaCadastro.php">Contato</a></li>
          <ul class="nav-icon">
            <li>
              <div class="dropdown text-end">
                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../../images/user.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" style="">
                  <li><a class="dropdown-item" href="logout.php">Entrar</a></li>
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
            <h1 class="h1Icones2">
              <img src="../../images/icone_Agendamento.png">Editando o agendamento
            </h1>
            <div class="container">               
              <div class="divForm">      
                <form method="POST" action="editar_action.php" class="needs-validation" novalidate="" id="form" name="form">
                  <p class="pForm">Escolha o serviço desejado e preencha os dados abaixo.</p> 
                  <div class="checkServicos"> 
                    <input type="hidden" name="id" value="<?=$agendamento['id'];?>"> 
                    <label class="form-check-label" for="cabelo">
                      <div class="card">
                        <img src="../../images/cabelo.png" width="26px" height="auto" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Cabelo</h5>
                          <h5 class="card-title">R$ 30,00</h5>
                          <input class="form-check-input" type="checkbox" id="cabelo" name="cabelo" value="s" checked>
                        </div>
                      </div>
                    </label>              
                    <label class="form-check-label" for="barba">
                      <div class="card">
                        <img src="../../images/barba.png" width="26px" height="auto" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Barba</h5>
                          <h5 class="card-title">R$ 15,00</h5>
                          <input class="form-check-input" type="checkbox" id="barba" name="barba" value="s">
                        </div>
                      </div>
                    </label>              
                    <label class="form-check-label" for="sobrancelha">
                      <div class="card" >
                        <img src="../../images/sobrancelha.png" width="26px" height="auto" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Sobrancelha</h5>
                          <h5 class="card-title">R$ 10,00</h5>
                          <input class="form-check-input" type="checkbox" id="sobrancelha" name="sobrancelha" value="s">
                        </div>
                      </div>
                    </label>              
                    <label class="../../form-check-label" for="progressiva">
                      <div class="card">
                        <img src="../../images/progressiva.png" width="26px" height="auto" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Progressiva</h5>
                          <h5 class="card-title">R$ 80,00</h5>
                          <input class="form-check-input" type="checkbox" id="progressiva" name="progressiva" value="s">
                        </div>
                      </div>
                    </label>  
                    <label class="form-check-label" for="coloracao">
                      <div class="card">
                        <img src="../../images/coloracao.png" width="26px" height="auto" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Coloração</h5>
                          <h5 class="card-title">R$ 45,00</h5>
                          <input class="form-check-input" type="checkbox" id="coloracao" name="coloracao" value="s">
                        </div>
                      </div>
                    </label>
                    <label class="form-check-label" for="hidratacao">
                      <div class="card">
                        <img src="../../images/hidratacao.png" width="26px" height="auto" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Hidratação</h5>
                          <h5 class="card-title">R$ 55,00</h5>
                          <input class="form-check-input" type="checkbox" id="hidratacao" name="hidratacao" value="s">
                        </div>
                      </div>
                    </label>
                  </div>
                  
                  <div class="mb-3">
                    <label for="txtNomeAgen" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="txtNomeAgen" name="txtNomeAgen" size="40" maxlength="40" value="<?=$agendamento['nome'];?>" placeholder="Insira seu nome completo" required="">
                    <div class="invalid-feedback">
                      Insira seu nome.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="txtCpfAgen" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="txtCpfAgen" name="txtCpfAgen" size="14" maxlength="14" value="<?=$agendamento['cpf'];?>" placeholder="Insira o seu CPF" onkeyup="mascara_cpf()" required="">
                    <div class="invalid-feedback">
                      Insira o seu CPF.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="txtCelularAgen" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="txtCelularAgen" name="txtCelularAgen" maxlength="14" value="<?=$agendamento['celular'];?>" placeholder="(00)00000-0000" required="">
                    <div class="invalid-feedback">
                      Insira o seu celular.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="dtDataAgen" class="form-label">Data<span class="spanInfoForm">(insira a data que você deseja)</span></label>                 
                    <input type="date" class="form-control" id="dtDataAgen" name="dtDataAgen" min="2022-11-25" maxlength="10 " value="<?=$agendamento['data'];?>" required="">
                    <div class="invalid-feedback">
                      Insira a data que você deseja.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="tmHoraAgen" class="form-label">Hora<span class="spanInfoForm">(insira a hora que você deseja)</span></label>
                    <input type="time" class="form-control" id="tmHoraAgen" name="tmHoraAgen" min="08:00" max="18:00" maxlength="11" value="<?=$agendamento['hora'];?>" required="">
                    <div class="invalid-feedback">
                      Insira a hora que você deseja.
                    </div>
                  </div> 
                                             
                  <div class="divBtnCdst">
                    <button class="btn btn-outline-light" type="submit" value="Agendar" name="Agendar" >Agendar</button>
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
          </div>
        </div>                  
      </div>      
    </main>
    <script src="../../js/mobile-navbar.js"></script>
  </body>
</html>
