<?php
// obtendo e sanitizando o id que vem pela URL
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

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
    <p>
      <label for="nome">Nome</label>
      <input type="text" name="nome" id="nome" required>
    </p>
    <button type="submit" name="atualizar">Atualizar fabricante</button>
  </form>

  <hr>

  <p><a href="visualizar.php">Voltar</a></p>

</body>
</html>