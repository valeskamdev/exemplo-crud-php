<?php
require_once "../src/funcoes-fabricantes.php";

$fabricantes = lerFabricantes($conexao);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Produtos - Inserção</title>
</head>
<body>
  <h1>Produtos | INSERT</h1>
  <hr>

  <form action="" method="post">
    <p>
      <label for="nome">Nome</label>
      <input type="text" name="nome" id="nome" required>
    </p>
    <p>
      <label for="preco">Preço</label>
      <input type="number" name="preco" id="preco" min="10" max="10000" step="0.01" required>
    </p>
    <p>
      <label for="quantidade">Quantidade</label>
      <input type="number" name="quantidade" id="quantidade" min="1" max="100" step="0.01" required>
    </p>
    <p>
      <label for="fabricante">Fabricante</label>
      <select name="fabricante" id="fabricante" required>
        <option value=""></option>
        <?php
        foreach ($fabricantes as $fabricante) : ?>
          <option value="<?=$fabricante["id"]?>"><?=$fabricante["nome"]?></option>
        <?php endforeach; ?>
      </select>
    </p>
    <p>
      <label for="descricao">Descricao</label> <br>
      <textarea name="descricao" id="descricao" cols="27" rows="3"></textarea>
    </p>
    <button type="submit">Inserir produto </button>
  </form>

  <hr>
  <p><a href="visualizar.php"></a></p>
</body>
</html>