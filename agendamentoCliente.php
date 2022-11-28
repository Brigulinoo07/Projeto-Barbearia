<?php
  include_once 'model/banco.php'; 
  
  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

  if (!empty($dados['Agendar'])) {
    
    if(!isset($dados['cabelo'])){
      $dados['cabelo'] = 'n';
    }
            
    if(!isset($dados['barba'])){
      $dados['barba'] = 'n';
    }
            
    if(!isset($dados['sobrancelha'])){
      $dados['sobrancelha'] = 'n';
    }

    if(!isset($dados['progressiva'])){
      $dados['progressiva'] = 'n';
    }
            
    if(!isset($dados['coloracao'])){
      $dados['coloracao'] = 'n';
    }
            
    if(!isset($dados['hidratacao'])){
      $dados['hidratacao'] = 'n';
    }

    $query_agendamentos = "INSERT INTO agendamentos (cabelo, barba, sobrancelha, progressiva, coloracao, hidratacao, nome, cpf, celular, data, hora)
        VALUES (:cabelo, :barba, :sobrancelha, :progressiva, :coloracao, :hidratacao, :nome, :cpf, :celular, :data, :hora)";
    $query_agendamentos = $conn->prepare($query_agendamentos);
    $query_agendamentos->bindParam(':cabelo', $dados['cabelo'], PDO::PARAM_STR);
    $query_agendamentos->bindParam(':barba', $dados['barba'], PDO::PARAM_STR);
    $query_agendamentos->bindParam(':sobrancelha', $dados['sobrancelha'], PDO::PARAM_STR);
    $query_agendamentos->bindParam(':progressiva', $dados['progressiva'], PDO::PARAM_STR);
    $query_agendamentos->bindParam(':coloracao', $dados['coloracao'], PDO::PARAM_STR);
    $query_agendamentos->bindParam(':hidratacao', $dados['hidratacao'], PDO::PARAM_STR);
    $query_agendamentos->bindParam(':nome', $dados['txtNomeAgen'], PDO::PARAM_STR);
    $query_agendamentos->bindParam(':cpf', $dados['txtCpfAgen'], PDO::PARAM_STR);
    $query_agendamentos->bindParam(':celular', $dados['txtCelularAgen'], PDO::PARAM_STR);
    $query_agendamentos->bindParam(':data', $dados['dtDataAgen'], PDO::PARAM_STR);
    $query_agendamentos->bindParam(':hora', $dados['tmHoraAgen'], PDO::PARAM_STR);
            
    $query_agendamentos->execute();
            
    if($query_agendamentos->rowCount()){
      echo "<script>alert('Agendado com sucesso!!');document.location='index.php'</script>";
    }else{
      echo "<script>alert('Erro: Não foi possível realizar o agendamento.');</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agendamento - Style Barber Point</title>
    <link rel="icon" type="imagem/png" href="images/icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
      window.onload = function (){
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
        <a class="logo" href="index.php"><img src="images/logo_nav.png" class="logo" ></a>
        <div class="mobile-menu">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
        <ul class="nav-list">
          <li><a href="index.php">Início</a></li>
          <li><a href="servicos.php">Serviços</a></li>
          <li><a href="contatoCliente.php">Contato</a></li>
          <li><a href="agendamentoCliente.php">Agendar</a></li> 
          <ul class="nav-icon">
            <li>
              <a href="https://www.facebook.com/" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg>
              </a>
            </li> 
            <li>
              <a href="https://www.instagram.com/" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/></svg>
              </a>
            </li> 
            <li>
              <a href="https://twitter.com/" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/></svg>
              </a>
            </li>
            <li>
              <div class="dropdown text-end">
                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="images/user.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" style="">
                  <li><a class="dropdown-item" href="pags_login/login.php">Entrar</a></li>
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
              <img src="images/icone_Agendamento.png">Faça seu agendamento
            </h1>
            <p>Faça o agendamento do seu serviço agora!!!</p>
            <div class="container">               
              <div class="divForm">      
                <form method="POST" action="" class="needs-validation" novalidate="" id="form" name="form">
                  <p class="pForm">Escolha o serviço desejado e preencha os dados abaixo.</p> 
                  <div class="checkServicos">     
                    <label class="form-check-label" for="cabelo">
                      <div class="card">
                        <img src="images/cabelo.png" width="26px" height="auto" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Cabelo</h5>
                          <h5 class="card-title">R$ 30,00</h5>
                          <input class="form-check-input" type="checkbox" id="cabelo" name="cabelo" value="s" checked>
                        </div>
                      </div>
                    </label>              
                    <label class="form-check-label" for="barba">
                      <div class="card">
                        <img src="images/barba.png" width="26px" height="auto" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Barba</h5>
                          <h5 class="card-title">R$ 15,00</h5>
                          <input class="form-check-input" type="checkbox" id="barba" name="barba" value="s">
                        </div>
                      </div>
                    </label>              
                    <label class="form-check-label" for="sobrancelha">
                      <div class="card" >
                        <img src="images/sobrancelha.png" width="26px" height="auto" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Sobrancelha</h5>
                          <h5 class="card-title">R$ 10,00</h5>
                          <input class="form-check-input" type="checkbox" id="sobrancelha" name="sobrancelha" value="s">
                        </div>
                      </div>
                    </label>              
                    <label class="form-check-label" for="progressiva">
                      <div class="card">
                        <img src="images/progressiva.png" width="26px" height="auto" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Progressiva</h5>
                          <h5 class="card-title">R$ 80,00</h5>
                          <input class="form-check-input" type="checkbox" id="progressiva" name="progressiva" value="s" >
                        </div>
                      </div>
                    </label>  
                    <label class="form-check-label" for="coloracao">
                      <div class="card">
                        <img src="images/coloracao.png" width="26px" height="auto" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Coloração</h5>
                          <h5 class="card-title">R$ 45,00</h5>
                          <input class="form-check-input" type="checkbox" id="coloracao" name="coloracao" value="s">
                        </div>
                      </div>
                    </label>
                    <label class="form-check-label" for="hidratacao">
                      <div class="card">
                        <img src="images/hidratacao.png" width="26px" height="auto" class="card-img-top" alt="...">
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
                    <input type="text" class="form-control" id="txtNomeAgen" name="txtNomeAgen" size="40" maxlength="40" placeholder="Insira seu nome completo" required="">
                    <div class="invalid-feedback">
                      Insira seu nome.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="txtCpfAgen" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="txtCpfAgen" name="txtCpfAgen" size="14" maxlength="14" placeholder="Insira o seu CPF" onkeyup="mascara_cpf()" required="">
                    <div class="invalid-feedback">
                      Insira o seu CPF.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="txtCelularAgen" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="txtCelularAgen" name="txtCelularAgen" maxlength="14" placeholder="(00)00000-0000" required="">
                    <div class="invalid-feedback">
                      Insira o seu celular.
                    </div>
                  </div>
                  
                  <div class="mb-3">
                    <label for="dtDataAgen" class="form-label">Data<span class="spanInfoForm">(insira a data que você deseja)</span></label>                 
                    <input type="date" class="form-control" id="dtDataAgen" name="dtDataAgen" min="2022-11-25" maxlength="10 " required="">
                    <div class="invalid-feedback">
                      Insira a data que você deseja(insira uma data válida).
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="tmHoraAgen" class="form-label">Hora<span class="spanInfoForm">(insira a hora que você deseja)</span></label>
                    <input type="time" class="form-control" id="tmHoraAgen" name="tmHoraAgen" min="08:00" max="18:00" maxlength="11" required="">
                    <div class="invalid-feedback">
                      Insira a hora que você deseja(insira uma hora válida).
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
                              alert("Erro!!! Contém campos não preenchidos/campos preenchidos de maneira incorreta!");
                            }
                      
                            else
                            {
                              alert("Agendado com sucesso!");
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

    <footer class="py-3">
      <div class="container">
        <ul class="text-center">
          <li class="nav-item"><a href="index.php" class="">Início</a></li>
          <li class="nav-item"><a href="servicos.php" class="">Serviços</a></li>
          <li class="nav-item"><a href="contatoCliente.php" class="">Contato</a></li>
          <li class="nav-item"><a href="agendamentoCliente.php" class="">Agendar</a></li>
        </ul>
        <hr class="lineFot">
        <div class="container px-4 text-center">
          <div class="row gx-5">
            <div class="col">
              <div class="imgFooter">
                <p class="titleFoot">SOBRE NÓS</p>
                <div class="center">
                  <a href="index.php" >
                    <img src="images/logo_foot.png" width="145px" height="auto" alt="...">
                  </a>
                </div>                 
                <div>   
                  <span class="sobreFoot">
                    Style Barber Point é uma barbearia moderna que veio para revolucionar o mercado de serviços de autocuidado facilitando o seu agendamento.
                  </span>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="contatosFoot">
                <p class="titleFoot">CONTATO</p>
                <li>
                  <div class="flexFoot">
                    <p class="pContatFoot">
                      <svg xmlns="http://www.w3.org/2000/svg" width="46" height="auto" fill="currentColor" class="svgFoot" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      </svg>                        
                      Av. Águia de Haia, 2633 - Cidade Antônio Estêvão de Carvalho, São Paulo - SP, 03694-000
                    </p>
                  </div>
                </li>
                <li>
                  <div class="flexFoot">                    
                    <p class="pContatFoot">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="svgFoot" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      </svg>
                      (11) 0000-0000
                    </p>
                  </div>
                </li>
                <li>
                  <a href="https://outlook.office.com/mail/" target="_blank">
                    <div class="flexFoot">                      
                      <p class="pContatFoot">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="svgFoot" viewBox="0 0 16 16">
                          <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg>
                                             suporte@stylebarberpoint.com
                      </p>
                    </div>
                  </a>
                </li>
              </div>
            </div>
            <div class="col">
              <div>
                <p class="titleFoot">COLABORADORES</p>
                <div class="center">
                  <span class="sobreFoot">
                    Henrique da Silva Machado<BR>
                    João Vitor de Sousa Rodrigues<BR>
                    Lucas Pereira Carvalho<BR>
                    Paulo Enrick Santos Silva                  
                  </span>
                </div>                 
              </div>    
            </div>
          </div>
        </div>

        <div class="itensFooter">          
          <div>
            <ul>
              <li class="ms-3">
                <a href="https://www.facebook.com/" target="_blank">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg>
                </a>
              </li>
              <li class="ms-3">
                <a  href="https://www.instagram.com/" target="_blank">
                  <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/></svg>
                </a>
              </li>
              <li class="ms-3">
                <a  href="https://twitter.com/" target="_blank">
                  <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/></svg>
                </a>
              </li>
            </ul>                       
            <div class="payFooter">    
              <div class="payment-list">
                <svg class="payment-list__item" viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img" width="38" height="24" aria-labelledby="pi-master"><title id="pi-master">Mastercard</title><path opacity=".07" d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"></path><path fill="#fff" d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"></path><circle fill="#EB001B" cx="15" cy="12" r="7"></circle><circle fill="#F79E1B" cx="23" cy="12" r="7"></circle><path fill="#FF5F00" d="M22 12c0-2.4-1.2-4.5-3-5.7-1.8 1.3-3 3.4-3 5.7s1.2 4.5 3 5.7c1.8-1.2 3-3.3 3-5.7z"></path></svg>
                <svg class="payment-list__item" viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img" width="38" height="24" aria-labelledby="pi-visa"><title id="pi-visa">Visa</title><path opacity=".07" d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"></path><path fill="#fff" d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"></path><path d="M28.3 10.1H28c-.4 1-.7 1.5-1 3h1.9c-.3-1.5-.3-2.2-.6-3zm2.9 5.9h-1.7c-.1 0-.1 0-.2-.1l-.2-.9-.1-.2h-2.4c-.1 0-.2 0-.2.2l-.3.9c0 .1-.1.1-.1.1h-2.1l.2-.5L27 8.7c0-.5.3-.7.8-.7h1.5c.1 0 .2 0 .2.2l1.4 6.5c.1.4.2.7.2 1.1.1.1.1.1.1.2zm-13.4-.3l.4-1.8c.1 0 .2.1.2.1.7.3 1.4.5 2.1.4.2 0 .5-.1.7-.2.5-.2.5-.7.1-1.1-.2-.2-.5-.3-.8-.5-.4-.2-.8-.4-1.1-.7-1.2-1-.8-2.4-.1-3.1.6-.4.9-.8 1.7-.8 1.2 0 2.5 0 3.1.2h.1c-.1.6-.2 1.1-.4 1.7-.5-.2-1-.4-1.5-.4-.3 0-.6 0-.9.1-.2 0-.3.1-.4.2-.2.2-.2.5 0 .7l.5.4c.4.2.8.4 1.1.6.5.3 1 .8 1.1 1.4.2.9-.1 1.7-.9 2.3-.5.4-.7.6-1.4.6-1.4 0-2.5.1-3.4-.2-.1.2-.1.2-.2.1zm-3.5.3c.1-.7.1-.7.2-1 .5-2.2 1-4.5 1.4-6.7.1-.2.1-.3.3-.3H18c-.2 1.2-.4 2.1-.7 3.2-.3 1.5-.6 3-1 4.5 0 .2-.1.2-.3.2M5 8.2c0-.1.2-.2.3-.2h3.4c.5 0 .9.3 1 .8l.9 4.4c0 .1 0 .1.1.2 0-.1.1-.1.1-.1l2.1-5.1c-.1-.1 0-.2.1-.2h2.1c0 .1 0 .1-.1.2l-3.1 7.3c-.1.2-.1.3-.2.4-.1.1-.3 0-.5 0H9.7c-.1 0-.2 0-.2-.2L7.9 9.5c-.2-.2-.5-.5-.9-.6-.6-.3-1.7-.5-1.9-.5L5 8.2z" fill="#142688"></path></svg>
                <svg class="payment-list__item" role="img" aria-labelledby="pi-elo" width="38" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 24"><title id="pi-elo">Elo</title><g fill-rule="nonzero" fill="none"><path d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z" fill="#000" opacity=".07"></path><path d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32" fill="#FFF"></path><g fill="#000"><path d="M13.3 15.5c-.6.6-1.4.9-2.3.9-.6 0-1.2-.2-1.6-.5l-1.2 1.9c.8.6 1.8.9 2.8.9 1.5 0 2.9-.6 3.9-1.6l-1.6-1.6zm-2.1-7.7c-3 0-5.5 2.4-5.5 5.4 0 1.1.3 2.2.9 3.1l9.8-4.2c-.6-2.5-2.7-4.3-5.2-4.3zm-3.3 5.8v-.4c0-1.8 1.5-3.2 3.2-3.2 1 0 1.8.5 2.4 1.1l-5.6 2.5zm11.6-8.3v10.5l1.8.8-.9 2.1-1.8-.8c-.4-.2-.7-.4-.9-.7-.2-.3-.3-.7-.3-1.3V5.3h2.1zM26 10.2c.3-.1.7-.2 1-.2 1.5 0 2.8 1.1 3.1 2.6l2.2-.4c-.5-2.5-2.7-4.4-5.3-4.4-.6 0-1.2.1-1.7.3l.7 2.1zm-2.6 7.1l1.5-1.7c-.7-.6-1.1-1.4-1.1-2.4s.4-1.8 1.1-2.4l-1.5-1.7c-1.1 1-1.8 2.5-1.8 4.1 0 1.7.7 3.1 1.8 4.1zm6.7-3.4c-.3 1.5-1.6 2.6-3.1 2.6-.4 0-.7-.1-1-.2l-.7 2.1c.5.2 1.1.3 1.7.3 2.6 0 4.8-1.9 5.3-4.4l-2.2-.4z"></path></g></g></svg>
                <svg class="payment-list__item" role="img" aria-labelledby="pi-hypercard" viewBox="0 0 38 24" width="38" height="24" xmlns="http://www.w3.org/2000/svg"><title id="pi-hypercard">Hypercard</title><g fill="none" fill-rule="evenodd"><path d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z" fill="#000" fill-rule="nonzero" opacity=".07"></path><path d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32" fill="#FFF" fill-rule="nonzero"></path><path d="M11.9 5.1H8.6c-1.4.1-2.6.6-2.9 1.8-.2.6-.3 1.3-.4 2-.7 3.3-1.3 6.7-2 9.9h25.4c2 0 3.3-.4 3.7-2 .2-.7.3-1.5.5-2.3.6-3.1 1.3-6.2 1.9-9.4H11.9z" fill="#B3131B" fill-rule="nonzero"></path><path d="M6.38 9.31h.605v1.827h2.3V9.31h.605v4.421h-.605v-2.067h-2.3v2.067h-.604v-4.42zm4.364 1.213h.551v3.208h-.55v-3.208zm0-1.213h.551v.614h-.55V9.31zm3.36 3.74c.168-.212.252-.528.252-.95 0-.257-.037-.477-.111-.662-.14-.355-.398-.533-.77-.533-.376 0-.633.188-.771.563a2.23 2.23 0 00-.112.765c0 .248.037.46.112.635.14.333.397.5.77.5a.773.773 0 00.63-.318zm-2.032-2.527h.526v.428c.109-.147.227-.26.355-.34.183-.12.398-.181.644-.181.366 0 .676.14.93.42.255.28.383.68.383 1.2 0 .701-.184 1.203-.551 1.504a1.25 1.25 0 01-.813.286c-.242 0-.446-.053-.61-.16a1.408 1.408 0 01-.323-.31v1.646h-.541v-4.493zm5.477.074c.215.107.378.246.49.417.109.162.181.352.217.569.032.148.048.385.048.71h-2.362c.01.327.087.59.232.787.144.197.368.296.67.296.284 0 .51-.093.678-.28a.944.944 0 00.205-.376h.532c-.014.119-.06.25-.14.396a1.432 1.432 0 01-.266.357c-.165.16-.368.268-.61.325a1.873 1.873 0 01-.443.048c-.402 0-.742-.146-1.02-.438-.28-.292-.419-.7-.419-1.227 0-.517.14-.938.421-1.26.281-.324.648-.485 1.102-.485.229 0 .45.054.665.16zm.199 1.265a1.403 1.403 0 00-.154-.562c-.148-.261-.396-.392-.743-.392a.824.824 0 00-.626.27c-.169.18-.258.408-.268.684h1.79zm1.237-1.354h.514v.557c.042-.108.146-.24.31-.396a.804.804 0 01.62-.23l.124.012v.572a.81.81 0 00-.178-.015c-.273 0-.482.088-.629.263a.92.92 0 00-.22.607v1.853h-.541v-3.223zm4.166.172c.228.176.365.48.411.912h-.526a.972.972 0 00-.22-.495c-.115-.132-.298-.198-.55-.198-.346 0-.593.169-.741.506-.097.219-.145.489-.145.81 0 .323.068.594.205.815.136.22.351.331.644.331.225 0 .403-.068.534-.206.132-.137.222-.325.273-.564h.526c-.06.427-.21.74-.451.937-.241.198-.549.297-.924.297-.422 0-.758-.154-1.008-.462-.251-.308-.377-.693-.377-1.154 0-.566.138-1.007.413-1.322a1.332 1.332 0 011.05-.472c.363 0 .659.088.886.265zm1.54 2.564c.114.09.25.135.406.135.19 0 .375-.044.554-.132a.745.745 0 00.451-.72v-.436a.927.927 0 01-.256.106 2.18 2.18 0 01-.307.06l-.328.042a1.255 1.255 0 00-.442.123c-.167.095-.25.245-.25.452 0 .156.057.28.172.37zm1.14-1.466c.125-.016.208-.068.25-.156a.476.476 0 00.036-.208c0-.185-.065-.318-.197-.402-.131-.083-.32-.125-.564-.125-.283 0-.484.077-.602.23a.752.752 0 00-.13.375h-.505c.01-.397.139-.673.387-.829a1.59 1.59 0 01.862-.233c.38 0 .687.072.924.217.235.144.352.369.352.674v1.857c0 .056.012.101.035.135.023.034.071.051.146.051a.824.824 0 00.177-.018v.4c-.084.025-.148.04-.192.046a1.408 1.408 0 01-.181.009c-.187 0-.322-.067-.406-.199a.767.767 0 01-.094-.298c-.11.145-.269.27-.475.376a1.47 1.47 0 01-.683.16c-.3 0-.544-.091-.733-.273a.905.905 0 01-.285-.681c0-.3.094-.531.28-.695.187-.165.432-.266.735-.304l.863-.109zm1.716-1.27h.514v.557c.043-.108.146-.24.31-.396a.804.804 0 01.62-.23l.124.012v.572a.81.81 0 00-.178-.015c-.273 0-.482.088-.629.263a.92.92 0 00-.22.607v1.853h-.541v-3.223zm2.6 2.516c.147.233.381.35.704.35a.745.745 0 00.619-.324c.161-.216.242-.525.242-.929 0-.407-.083-.708-.25-.904a.78.78 0 00-.617-.294.814.814 0 00-.663.313c-.17.21-.255.516-.255.921 0 .345.074.634.22.867zm1.216-2.417c.096.06.206.166.328.316V9.295h.52v4.436h-.487v-.448a1.172 1.172 0 01-.448.43c-.173.089-.37.133-.593.133-.36 0-.67-.151-.933-.453-.263-.302-.394-.704-.394-1.206 0-.469.12-.876.36-1.22.239-.344.582-.516 1.027-.516.247 0 .453.052.62.156z" fill="#FFF"></path></g></svg>
                <svg class="payment-list__item" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 38 24" width="38" height="24" aria-labelledby="pi-american_express"><title id="pi-american_express">American Express</title><g fill="none"><path fill="#000" d="M35,0 L3,0 C1.3,0 0,1.3 0,3 L0,21 C0,22.7 1.4,24 3,24 L35,24 C36.7,24 38,22.7 38,21 L38,3 C38,1.3 36.6,0 35,0 Z" opacity=".07"></path><path fill="#006FCF" d="M35,1 C36.1,1 37,1.9 37,3 L37,21 C37,22.1 36.1,23 35,23 L3,23 C1.9,23 1,22.1 1,21 L1,3 C1,1.9 1.9,1 3,1 L35,1"></path><path fill="#FFF" d="M8.971,10.268 L9.745,12.144 L8.203,12.144 L8.971,10.268 Z M25.046,10.346 L22.069,10.346 L22.069,11.173 L24.998,11.173 L24.998,12.412 L22.075,12.412 L22.075,13.334 L25.052,13.334 L25.052,14.073 L27.129,11.828 L25.052,9.488 L25.046,10.346 L25.046,10.346 Z M10.983,8.006 L14.978,8.006 L15.865,9.941 L16.687,8 L27.057,8 L28.135,9.19 L29.25,8 L34.013,8 L30.494,11.852 L33.977,15.68 L29.143,15.68 L28.065,14.49 L26.94,15.68 L10.03,15.68 L9.536,14.49 L8.406,14.49 L7.911,15.68 L4,15.68 L7.286,8 L10.716,8 L10.983,8.006 Z M19.646,9.084 L17.407,9.084 L15.907,12.62 L14.282,9.084 L12.06,9.084 L12.06,13.894 L10,9.084 L8.007,9.084 L5.625,14.596 L7.18,14.596 L7.674,13.406 L10.27,13.406 L10.764,14.596 L13.484,14.596 L13.484,10.661 L15.235,14.602 L16.425,14.602 L18.165,10.673 L18.165,14.603 L19.623,14.603 L19.647,9.083 L19.646,9.084 Z M28.986,11.852 L31.517,9.084 L29.695,9.084 L28.094,10.81 L26.546,9.084 L20.652,9.084 L20.652,14.602 L26.462,14.602 L28.076,12.864 L29.624,14.602 L31.499,14.602 L28.987,11.852 L28.986,11.852 Z"></path></g></svg>
                <svg class="payment-list__item" viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img" width="38" height="24" aria-labelledby="pi-diners_club"><title id="pi-diners_club">Diners Club</title><path opacity=".07" d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"></path><path fill="#fff" d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"></path><path d="M12 12v3.7c0 .3-.2.3-.5.2-1.9-.8-3-3.3-2.3-5.4.4-1.1 1.2-2 2.3-2.4.4-.2.5-.1.5.2V12zm2 0V8.3c0-.3 0-.3.3-.2 2.1.8 3.2 3.3 2.4 5.4-.4 1.1-1.2 2-2.3 2.4-.4.2-.4.1-.4-.2V12zm7.2-7H13c3.8 0 6.8 3.1 6.8 7s-3 7-6.8 7h8.2c3.8 0 6.8-3.1 6.8-7s-3-7-6.8-7z" fill="#3086C8"></path></svg>
                <svg class="payment-list__item" viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img" width="38" height="24" aria-labelledby="pi-boleto"><title id="pi-boleto">Boleto</title><path fill="#fff" d="M35.7 23.965H2.3a2.307 2.307 0 0 1-2.3-2.3v-19.4C0 1 1.035-.035 2.3-.035h33.4c1.265 0 2.3 1.035 2.3 2.3v19.4c0 1.265-1.035 2.3-2.3 2.3z"></path><path fill="#A7A8AB" d="M35.564 23.965H2.436c-1.344 0-2.436-1.077-2.436-2.4v-19.2c0-1.323 1.092-2.4 2.436-2.4h33.128c1.344 0 2.436 1.077 2.436 2.4v19.2c0 1.323-1.092 2.4-2.436 2.4zM2.436.925c-.806 0-1.462.646-1.462 1.44v19.2c0 .794.656 1.44 1.462 1.44h33.128c.806 0 1.462-.646 1.462-1.44v-19.2c0-.794-.656-1.44-1.462-1.44H2.436z" opacity=".25"></path><path d="M8.079 4.945h.7v6.298h-.7zm-1.83 0h.7v6.298h-.7zm7.256 0h1.901v6.298h-1.901zm9.715 0h.95v6.298h-.95zm2.324 0h.95v6.298h-.95zm3.804 0h1.221v6.298h-1.221zm-1.375 0h.395v6.298h-.395zm-6.389 0h.395v6.298h-.395zm-.845 0h.395v6.298h-.395zm-2.746 0h.395v6.298h-.395zm-6.31 0h.395v6.298h-.395zm-1.163 0h.733v6.298h-.733zM6.249 19.3v-6.478H8.68c.495 0 .891.065 1.191.196.299.131.532.333.701.606.17.271.255.556.255.855 0 .276-.075.537-.225.781a1.604 1.604 0 0 1-.679.593c.392.115.694.311.903.588.211.276.317.603.317.98 0 .305-.065.587-.193.847a1.644 1.644 0 0 1-.475.603c-.189.14-.425.247-.709.32a4.328 4.328 0 0 1-1.046.109H6.248zm.86-3.755H8.51c.38 0 .653-.026.817-.075a.903.903 0 0 0 .493-.324.936.936 0 0 0 .166-.567 1.03 1.03 0 0 0-.155-.568c-.103-.164-.25-.278-.442-.338s-.52-.09-.985-.09H7.109v1.963zm0 2.995h1.614c.277 0 .472-.011.585-.032.196-.035.362-.094.495-.176a.946.946 0 0 0 .327-.362c.086-.158.128-.341.128-.547 0-.243-.062-.452-.187-.632a.978.978 0 0 0-.516-.377c-.219-.072-.535-.109-.947-.109H7.109v2.235zm4.813-1.588c0-.867.241-1.509.725-1.927.403-.347.896-.52 1.476-.52.644 0 1.172.211 1.582.633.409.421.614 1.004.614 1.748 0 .603-.09 1.077-.271 1.422a1.92 1.92 0 0 1-.792.805 2.292 2.292 0 0 1-1.132.286c-.657 0-1.188-.21-1.594-.63-.406-.421-.608-1.027-.608-1.817zm.814.002c0 .6.131 1.05.394 1.347.264.299.594.448.994.448.395 0 .724-.149.988-.449.262-.3.394-.757.394-1.371 0-.579-.133-1.018-.397-1.315a1.261 1.261 0 0 0-.985-.448c-.4 0-.73.148-.994.445-.262.297-.394.745-.394 1.344zm4.498 2.346v-6.478h.796V19.3h-.796zm5.231-1.52l.823.109c-.128.478-.368.85-.718 1.114-.35.264-.796.397-1.341.397-.685 0-1.227-.211-1.629-.633-.401-.421-.602-1.013-.602-1.775 0-.787.202-1.399.608-1.834.406-.436.932-.653 1.579-.653.626 0 1.137.213 1.534.639.397.427.596 1.027.596 1.8l-.004.211h-3.497c.03.514.175.909.437 1.182a1.3 1.3 0 0 0 .979.41c.291 0 .54-.077.745-.231.207-.154.369-.4.49-.737zm-2.606-1.276h2.615c-.035-.395-.136-.691-.3-.888a1.216 1.216 0 0 0-.983-.46c-.365 0-.671.122-.92.366-.247.244-.385.572-.412.982zm6.164 2.086l.109.703a2.951 2.951 0 0 1-.599.071c-.288 0-.511-.045-.671-.137-.158-.092-.27-.211-.335-.36s-.097-.463-.097-.941v-2.705h-.588v-.615h.588v-1.161l.796-.478v1.639h.796v.615h-.796v2.751c0 .228.014.374.042.439a.324.324 0 0 0 .136.155.53.53 0 0 0 .271.057l.347-.032zm.487-1.638c0-.867.241-1.509.725-1.927.403-.347.896-.52 1.476-.52.644 0 1.172.211 1.582.633.409.421.614 1.004.614 1.748 0 .603-.09 1.077-.271 1.422a1.92 1.92 0 0 1-.792.805 2.292 2.292 0 0 1-1.132.286c-.657 0-1.188-.21-1.594-.63-.406-.421-.608-1.027-.608-1.817zm.814.002c0 .6.131 1.05.394 1.347.264.299.594.448.994.448.395 0 .724-.149.988-.449.262-.3.394-.757.394-1.371 0-.579-.133-1.018-.397-1.315a1.261 1.261 0 0 0-.985-.448c-.4 0-.73.148-.994.445-.262.297-.394.745-.394 1.344z" fill="#221F1F"></path></svg>
                <svg class="payment-list__item" style="height: 17px; background: white;border: solid 1px #e1e3e4;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 952.77 338.7"><path d="M393.22,316.26V122a64.71,64.71,0,0,1,64.71-64.71l57.35.08A64.62,64.62,0,0,1,579.77,122v41.34a64.72,64.72,0,0,1-64.71,64.72H434" fill="none" stroke="#939598" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.26"></path><path d="M595.8,57.28h24.88a26.56,26.56,0,0,1,26.56,26.56v145.1" fill="none" stroke="#939598" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.26"></path><path d="M641.9,34.8,630.62,23.51a7.16,7.16,0,0,1,0-10.13L641.9,2.1a7.18,7.18,0,0,1,10.15,0l11.27,11.28a7.16,7.16,0,0,1,0,10.13L652,34.8a7.17,7.17,0,0,1-10.14,0" fill="#32bcad"></path><path d="M695,57.15h24.67a47.85,47.85,0,0,1,33.84,14l57.71,57.71a19.13,19.13,0,0,0,27.07,0l57.5-57.49a47.81,47.81,0,0,1,33.83-14h20.06" fill="none" stroke="#939598" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.26"></path><path d="M695,227.67h24.67a47.86,47.86,0,0,0,33.84-14l57.71-57.71a19.15,19.15,0,0,1,27.07,0l57.5,57.5a47.84,47.84,0,0,0,33.83,14h20.06" fill="none" stroke="#939598" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.26"></path><path d="M246.13,264.53A46.07,46.07,0,0,1,213.35,251L166,203.62a9,9,0,0,0-12.44,0l-47.51,47.51A46.09,46.09,0,0,1,73.27,264.7H64l60,60a48,48,0,0,0,67.81,0l60.12-60.13Z" fill="#32bcad"></path><path d="M73.28,97.09a46.08,46.08,0,0,1,32.78,13.57l47.51,47.52a8.81,8.81,0,0,0,12.44,0l47.34-47.34a46,46,0,0,1,32.78-13.58h5.7L191.71,37.14a47.94,47.94,0,0,0-67.81,0L64,97.09Z" fill="#32bcad"></path><path d="M301.56,147l-36.33-36.33a7,7,0,0,1-2.58.52H246.13a32.62,32.62,0,0,0-22.93,9.5L175.86,168a22.74,22.74,0,0,1-32.13,0L96.21,120.51A32.62,32.62,0,0,0,73.28,111H53a7.12,7.12,0,0,1-2.44-.49L14,147a48,48,0,0,0,0,67.81l36.48,36.48a6.85,6.85,0,0,1,2.44-.49H73.28a32.63,32.63,0,0,0,22.93-9.51l47.51-47.51c8.59-8.58,23.56-8.58,32.14,0l47.34,47.33a32.62,32.62,0,0,0,22.93,9.5h16.52a6.9,6.9,0,0,1,2.58.52l36.33-36.33a47.94,47.94,0,0,0,0-67.81" fill="#32bcad"></path><path d="M442.54,299.75a42.13,42.13,0,0,0-8.89,1.35v11.84a20.6,20.6,0,0,0,6.92,1.16c5.94,0,8.75-2,8.75-7.23,0-4.92-2.3-7.12-6.78-7.12m-10.89,22V298.32h1.63l.17,1a46.87,46.87,0,0,1,9.26-1.49,9.16,9.16,0,0,1,6.07,1.76c2,1.66,2.68,4.34,2.68,7.26s-1,5.94-3.8,7.53a14.59,14.59,0,0,1-6.89,1.53,24.82,24.82,0,0,1-7.12-1.09v6.89Z" fill="#939598"></path><path d="M466.36,299.68c-5.93,0-8.58,1.86-8.58,7.09,0,5.05,2.61,7.33,8.58,7.33s8.55-1.84,8.55-7.06c0-5.05-2.61-7.36-8.55-7.36M474,314.1c-2,1.42-4.62,1.83-7.64,1.83s-5.73-.44-7.66-1.83c-2.17-1.53-3.06-4-3.06-7.19s.89-5.67,3.06-7.23c1.93-1.39,4.58-1.83,7.66-1.83s5.67.44,7.64,1.83c2.2,1.56,3.05,4.1,3.05,7.19s-.88,5.7-3.05,7.23" fill="#939598"></path><path d="M502.1,315.45l-6.62-14.21h-.13l-6.52,14.21H487L480,298.32h2.2l5.87,14.38h.14l6.38-14.38h1.83l6.54,14.38h.14l5.73-14.38H511l-7.06,17.13Z" fill="#939598"></path><path d="M523.75,299.64c-5.5,0-7.36,2.45-7.7,6h15.4c-.17-3.9-2.17-6-7.7-6m-.07,16.29c-3.29,0-5.43-.48-7.13-1.9-2-1.73-2.67-4.24-2.67-7.12s.91-5.67,3.19-7.33a11.38,11.38,0,0,1,6.68-1.73,12,12,0,0,1,6.85,1.66c2.47,1.66,2.95,4.58,2.95,7.9H516c.07,3.53,1.22,6.65,7.87,6.65a51.75,51.75,0,0,0,8.85-1v1.8a52.33,52.33,0,0,1-9,1.05" fill="#939598"></path><path d="M539.3,315.45V298.32h1.62l.17,1c3.63-.92,5.33-1.49,8.52-1.49h.24v1.9h-.48c-2.68,0-4.31.37-8.07,1.35v14.35Z" fill="#939598"></path><path d="M561.47,299.64c-5.49,0-7.36,2.45-7.7,6h15.4c-.17-3.9-2.17-6-7.7-6m-.07,16.29c-3.29,0-5.42-.48-7.12-1.9-2-1.73-2.68-4.24-2.68-7.12s.92-5.67,3.19-7.33a11.42,11.42,0,0,1,6.68-1.73,12,12,0,0,1,6.85,1.66c2.48,1.66,3,4.58,3,7.9H553.7c.07,3.53,1.22,6.65,7.87,6.65a51.76,51.76,0,0,0,8.86-1v1.8a52.44,52.44,0,0,1-9,1.05" fill="#939598"></path><path d="M593.2,300.83a20.6,20.6,0,0,0-6.92-1.15c-5.94,0-8.75,2-8.75,7.23,0,4.95,2.31,7.12,6.78,7.12a44.06,44.06,0,0,0,8.89-1.33Zm.38,14.62-.18-1a46.06,46.06,0,0,1-9.26,1.5,9,9,0,0,1-6.07-1.77c-2-1.66-2.68-4.34-2.68-7.25,0-3.06,1-5.94,3.8-7.5a14.35,14.35,0,0,1,6.92-1.56,26.18,26.18,0,0,1,7.09,1.08V291.1h2v24.35Z" fill="#939598"></path><path d="M624.55,299.75a42.13,42.13,0,0,0-8.89,1.35v11.81a20,20,0,0,0,6.92,1.19c5.94,0,8.75-2,8.75-7.23,0-4.92-2.3-7.12-6.78-7.12m5.12,14.65a14.57,14.57,0,0,1-6.88,1.53,24.35,24.35,0,0,1-7.67-1.29l-.1.81h-1.36V291.1h2v8.17a48.34,48.34,0,0,1,9.06-1.42,9.16,9.16,0,0,1,6.07,1.76c2,1.66,2.68,4.34,2.68,7.26s-1,5.94-3.8,7.53" fill="#939598"></path><path d="M636.13,322v-1.86c1,.1,1.9.17,2.54.17,2.48,0,4-.72,5.36-3.53l.65-1.36-9-17.13H638l7.67,14.79h.13l7.29-14.79h2.28l-9.64,19.24c-1.76,3.49-3.66,4.64-7.16,4.64a19.48,19.48,0,0,1-2.47-.17" fill="#939598"></path><path d="M683,305.68h-6.64v6H683c4.58,0,6.31-.51,6.31-3,0-2.68-2.38-3-6.35-3M681.76,296h-5.42v6.1h5.46c4.51,0,6.31-.54,6.31-3.08,0-2.72-2.28-3-6.35-3m10.32,17.88c-2.45,1.56-5.4,1.62-10.79,1.62H671.14V292.22h9.91c4.65,0,7.5.06,9.87,1.49a4.91,4.91,0,0,1,2.38,4.61c0,2.44-1,4.07-3.67,5.16v.13c3,.68,4.92,2.21,4.92,5.5a5,5,0,0,1-2.47,4.72" fill="#939598"></path><path d="M714.84,308.26c-2-.17-4-.27-6.17-.27-3.49,0-4.72.71-4.72,2.31s1,2.3,3.7,2.3a34.52,34.52,0,0,0,7.19-1Zm1,7.19-.13-1a41.11,41.11,0,0,1-9.3,1.5,8.88,8.88,0,0,1-5.19-1.26,5.3,5.3,0,0,1,1-8.78c1.8-.85,4.21-.92,6.42-.92,1.79,0,4.2.1,6.2.24v-.31c0-2.68-1.76-3.56-6.58-3.56-1.86,0-4.14.1-6.31.3v-3.46c2.41-.2,5.13-.33,7.37-.33,3,0,6.07.23,8,1.59s2.34,3.33,2.34,5.87v10.14Z" fill="#939598"></path><path d="M742,315.45V306c0-3.12-1.59-4.24-4.44-4.24a32.63,32.63,0,0,0-7,1.08v12.62h-4.78V298.32h3.9l.17,1.09a39.6,39.6,0,0,1,9.16-1.56,8.45,8.45,0,0,1,5.87,1.76c1.35,1.22,1.86,2.92,1.86,5.36v10.48Z" fill="#939598"></path><path d="M760.26,315.93c-2.21,0-4.62-.31-6.38-1.8-2.1-1.7-2.71-4.37-2.71-7.26,0-2.71.88-5.67,3.49-7.33,2.14-1.39,4.78-1.69,7.53-1.69,2,0,3.9.13,6,.33v3.67c-1.73-.17-3.8-.3-5.46-.3-4.55,0-6.69,1.42-6.69,5.36,0,3.69,1.6,5.29,5.33,5.29a40.69,40.69,0,0,0,7.19-.88v3.52a42.64,42.64,0,0,1-8.34,1.09" fill="#939598"></path><path d="M782.73,301.44c-4.55,0-6.55,1.43-6.55,5.33s2,5.56,6.55,5.56,6.48-1.39,6.48-5.29-1.93-5.6-6.48-5.6m8.21,12.69c-2.1,1.42-4.85,1.8-8.21,1.8s-6.17-.41-8.24-1.8c-2.38-1.56-3.23-4.14-3.23-7.22s.85-5.71,3.23-7.27c2.07-1.39,4.81-1.79,8.24-1.79s6.11.4,8.21,1.79c2.37,1.56,3.19,4.18,3.19,7.23s-.85,5.7-3.19,7.26" fill="#939598"></path><path d="M821.74,315.93c-2.88,0-6-.48-8.34-2.41-2.78-2.31-3.63-5.87-3.63-9.7,0-3.43,1.09-7.5,4.71-9.87,2.82-1.83,6.31-2.21,9.84-2.21,2.58,0,5.23.17,8.11.41v4.17c-2.47-.2-5.53-.37-7.9-.37-6.62,0-9.43,2.51-9.43,7.87s2.61,7.9,7.49,7.9a52.84,52.84,0,0,0,10.35-1.39v4.14a58,58,0,0,1-11.2,1.46" fill="#939598"></path><path d="M847,300.9c-4,0-5.5,1.43-5.81,4h11.54c-.14-2.78-1.77-4-5.73-4m-.72,15c-2.81,0-5.36-.34-7.26-1.9s-2.75-4.24-2.75-7.16c0-2.61.85-5.53,3.23-7.23,2.1-1.49,4.78-1.79,7.5-1.79,2.44,0,5.32.27,7.42,1.73,2.75,1.93,3,4.92,3,8.44H841.16c.1,2.62,1.49,4.31,6.31,4.31a61.81,61.81,0,0,0,9.13-.88v3.36a65.31,65.31,0,0,1-10.32,1.12" fill="#939598"></path><path d="M878.72,315.45V306c0-3.12-1.59-4.24-4.44-4.24a32.63,32.63,0,0,0-7,1.08v12.62h-4.78V298.32h3.9l.17,1.09a39.6,39.6,0,0,1,9.16-1.56,8.45,8.45,0,0,1,5.87,1.76c1.35,1.22,1.86,2.92,1.86,5.36v10.48Z" fill="#939598"></path><path d="M897.09,315.93c-2.31,0-4.41-.65-5.56-2.45a8.85,8.85,0,0,1-1.26-5.18v-6.42h-3.46v-3.56h3.46l.51-5.19H895v5.19h6.75v3.56H895v5.5a8.26,8.26,0,0,0,.47,3.26c.51,1.15,1.63,1.59,3.13,1.59a21.3,21.3,0,0,0,3.42-.34v3.43a27.57,27.57,0,0,1-4.95.61" fill="#939598"></path><path d="M906.44,315.45V298.32h3.9l.17,1.09a29.76,29.76,0,0,1,8.48-1.56,5.23,5.23,0,0,1,.61,0V302c-.54,0-1.19,0-1.66,0a26.94,26.94,0,0,0-6.72.88v12.65Z" fill="#939598"></path><path d="M937,308.26c-2-.17-4-.27-6.18-.27-3.49,0-4.71.71-4.71,2.31s1,2.3,3.69,2.3a34.61,34.61,0,0,0,7.2-1Zm1,7.19-.14-1a41.11,41.11,0,0,1-9.3,1.5,8.88,8.88,0,0,1-5.19-1.26,4.87,4.87,0,0,1-1.9-4.14,4.81,4.81,0,0,1,2.89-4.64c1.8-.85,4.2-.92,6.41-.92,1.8,0,4.21.1,6.21.24v-.31c0-2.68-1.77-3.56-6.58-3.56-1.87,0-4.14.1-6.31.3v-3.46c2.41-.2,5.12-.33,7.36-.33,3,0,6.07.23,8,1.59s2.34,3.33,2.34,5.87v10.14Z" fill="#939598"></path><path d="M947.92,291.1h4.79v24.35h-4.79Z" fill="#939598"></path></svg>
              </div>
            </div>
          </div>
        </div>
        <hr class="lineFot">      
        <p class="text-center">© 2022 Barber Style Point</p>
      </div>
    </footer> 
    <script src="js/mobile-navbar.js"></script>
  </body>
</html>


