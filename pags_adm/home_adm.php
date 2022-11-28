<?php
  include('protect.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - Style Barber Point</title>
    <link rel="icon" type="imagem/png" href="../images/icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </head>

  <body>
    <header>
      <nav>
        <a class="logo" href="home_adm.php"><img src="../images/logo_nav.png" class="logo" ></a>
        <div class="mobile-menu">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
        <ul class="nav-list">
          <li><a href="adm_cadastros/consultaCadastro.php">Cadastros</a></li>
          <li><a href="adm_agendamentos/consultaAgendamento.php">Agendamentos</a></li>
          <li><a href="adm_contatos/consultaContato.php">Contato</a></li>
          <ul class="nav-icon">
            <li>
              <div class="dropdown text-end">
                <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../images/user.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" style="">
                  <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                </ul>
              </div>
            </li>          
          </ul>                           
        </ul>  
      </nav>
    </header>

    <main>
        <div class="container">
            <div class="col">
                &nbsp;
            </div>
            <h1>Bem-vindo ao sistema de gerenciamento!</h1>
        </div>
    </main>    
    <script src="../js/mobile-navbar.js"></script>
  </body>
</html>


