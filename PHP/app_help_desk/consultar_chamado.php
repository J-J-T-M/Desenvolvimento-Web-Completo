<?php require_once "validador_acesso.php" ?>
<?php
  // array que vai conter os chamados 
  $calleds = array();
  // abrindo o arquivo para a leitura
  $file = fopen("arquivo.txt", "r");
  // feof($file); //teste pelo fim do arquivo porem ela retorna verdadeiro quando ela achar o final do arquivo
 
  while(!feof($file)){
    //  fgets($file); // recuperar o que estar escrito na linha até a quebra de linha 
    $record = fgets($file);
    //explode dos detalhes do registro para verificar o id do usuário responsável pelo cadastro
    $registro_detalhes = explode(' - ', $record);
    //(perfil id = 2) só vamos exibir o chamado, se ele foi criado pelo usuário
    if($_SESSION['profilesId'] == 2) {

      //se usuário autenticado não for o usuário de abertura do chamado então não faz nada
      if($_SESSION['id'] != $registro_detalhes[0]) {
        continue; //não faz nada

      } else {
        $calleds[] = $record; //adiciona o registro do arquivo ao array $chamados
      }

    } else {
      $calleds[] = $record; //adiciona o registro do arquivo ao array $chamados
    }
  }
  // fechar o arquivo
  fclose($file);
  
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="logoff.php">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
               <?php foreach ($calleds as $called) { ?>
                <?php
                $called_data = explode(' - ', $called);

                if($_SESSION['profilesId'] == 2 ){
                  
                  if ($_SESSION['id'] != $called_data[0]){
                    continue;
                  }
                } 
                // verificando se tem os três registros para ser impresso 
                if (count($called_data) < 3) {
                  continue;
                }
                ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?=$called_data[2]?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?=$called_data[1]?></h6>
                    <h6 class="card-subtitle mb-2 text-muted"><?=$called_data[3]?></h6>
                    <p class="card-text"><?=$called_data[4]?></p>
                  </div>
                </div>
              <?php } ?>
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>