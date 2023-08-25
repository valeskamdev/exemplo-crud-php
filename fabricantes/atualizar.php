<?php
require_once "../src/funcoes-fabricantes.php";

// obtendo e sanitizando o id que vem pela URL
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$fabricante = lerUmFabricantes($conexao, $id);

if (isset($_POST['atualizar'])) {
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
  atualizarFabricante($conexao, $nome, $id);
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
  <title>Fabricantes - Atualização</title>
</head>
<body>
  <h1>Fabricantes | SELECT/UPDATE</h1>
  <hr>

  <form action="" method="post">
    <!-- campo oculto usado apenas para registrar o id do fabricante -->
    <input type="hidden" name="id" value="<?=$fabricante['nome']?>">
    <p>
      <label for="nome">Nome</label>
      <input type="text" name="nome" id="nome" value="<?=$fabricante['nome']?>" required>
    </p>
    <button type="submit" name="atualizar">Atualizar fabricante</button>
  </form>

  <hr>

  <p><a href="visualizar.php">Voltar</a></p>

</body>
</html>