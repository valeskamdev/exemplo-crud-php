<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/funcoes-fabricantes.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$produto = lerUmProduto($conexao, $id);

$fabricantes = lerFabricantes($conexao);

if(isset($_POST["atualizar"])) {
  $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
  $preco = filter_input(INPUT_POST, "preco", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $quantidade = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_NUMBER_INT);
  $fabricanteId = filter_input(INPUT_POST, "fabricante", FILTER_SANITIZE_NUMBER_INT);
  $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);

  atualizarProduto($conexao, $id, $nome, $preco, $quantidade, $descricao, $fabricanteId);

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
  <title>Produtos - Atualização</title>
</head>
<body>
  <h1>Produtos | SELECT/UPDATE</h1>
  <hr>

  <form action="" method="post">
    <p>
      <label for="nome">Nome</label>
      <input type="text" name="nome" id="nome" value="<?=$produto['nome']?>" required>
    </p>
    <p>
      <label for="preco">Preço</label>
      <input type="number" name="preco" id="preco" value="<?=$produto['preco']?>" min="10" max="10000" step="0.01" required>
    </p>
    <p>
      <label for="quantidade">Quantidade</label>
      <input type="number" name="quantidade" id="quantidade" value="<?=$produto['quantidade']?>" min="1" max="100" step="0.01" required>
    </p>
    <p>
      <label for="fabricante">Fabricante</label>
      <select name="fabricante" id="fabricante" required>
        <option value="<?=$produto['fabricante_id']?>"></option>
        <?php
        foreach ($fabricantes as $fabricante) : ?>
          <option
            <?php if ($produto["fabricante_id"] === $fabricante["id"]) echo " selected "; ?>
            value="<?=$fabricante["id"]?>"><?=$fabricante["nome"]?></option>
        <?php endforeach; ?>
      </select>
    </p>
    <p>
      <label for="descricao">Descricao</label> <br>
      <textarea name="descricao" id="descricao"  cols="27" rows="3"><?=$produto['descricao']?></textarea>
    </p>
    <button type="submit" name="atualizar">Atualizar produto </button>
  </form>

  <hr>
  <p><a href="visualizar.php"></a></p>
</body>
</html>