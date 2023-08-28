<?php
require_once "../src/funcoes-fabricantes.php";

// obtendo e sanitizando o id que vem pela URL
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$fabricante = lerUmFabricantes($conexao, $id);

if (isset($_POST['excluir'])) {
  deletarFabricante($conexao, $id);
  header("location:visualizar.php");
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Fabricantes - Exclusão</title>
</head>
<body>
  <h1>Fabricantes | SELECT/DELETE</h1>
  <hr>

  <h2>Tem certeza que deseja excluir o fabricante abaixo?</h2>

  <form action="" method="post">
    <!-- campo oculto usado apenas para registrar o id do fabricante -->
    <input type="hidden" name="id" value="<?=$fabricante['nome']?>">
    <p>
      <label for="nome">Nome</label>
      <input type="text" name="nome" id="nome" value="<?=$fabricante['nome']?>" disabled>
    </p>
    <button type="submit" name="excluir" >Excluir fabricante</button>
  </form>

  <hr>

  <p><a href="visualizar.php">Voltar</a></p>
</body>
</html>