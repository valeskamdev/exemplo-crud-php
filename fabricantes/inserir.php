<?php

if(isset($_POST['inserir'])) {
  require_once "../src/funcoes-fabricantes.php";

  // capturando o valor do campo nome e sanitizando
  $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);

  // pode ser assim também
  //  $nome = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);

  inserirFabricantes($conexao, $nome);
}
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Fabricantes - Iserção</title>
</head>
<body>
  <h1>Fabricantes | INSERT</h1>
  <hr>

  <form action="" method="post">
    <p>
      <label for="nome">Nome</label>
      <input type="text" name="nome" id="nome" required>
    </p>
    <button type="submit" name="inserir">Inserir fabricante</button>
  </form>

</body>
</html>