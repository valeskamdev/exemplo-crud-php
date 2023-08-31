<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/utilities/funcoes-utilitarias.php";

$produtos = lerProdutos($conexao);
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Produtos - Visualização</title>
  <style>
    * {
      box-sizing: border-box;
    }

    .produtos {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      width: 80%;
      margin: auto;
      font-family: "Poor Richard";
      font-size: 1.6rem;
      font-weight: bold;
    }

    .produto {
      padding: 1rem;
      box-shadow: rgb(98, 69, 175) 0px 0px 0px 3px, rgb(186, 141, 255) 0px 0px 0px 6px;
      width: 350px;

    }

    p {
      display: flex;
      justify-content: space-between;
    }
  </style>
</head>
<body>
  <h1>Produtos | SELECT <a href="../index.php">Home</a></h1>

    <hr>
  <h2>Lendo e carregando todos os produtos</h2>

  <p><a href="inserir.php">Inserir novo produto</a></p>
  <p>Quantidade de produtos</p>

  <div class="produtos">
    <?php foreach ($produtos as $produto) : ?>
    <article class="produto">
      <h3><?=$produto["produto"]?></h3>
      <h4><?=$produto["fabricante"]?></h4>
      <p><b>Preço:</b> R$<?=formatarPreco($produto["preco"])?></p>
      <p><b>Quantidade:</b> <?=$produto["quantidade"]?></p>
      <p><b>Preço total:</b> <?=formatarPreco($produto["total"]);?></p>
<!--  <h5>Preço total: --><?php //=calcularTotal($produto["preco"], $produto["quantidade"]);?><!--</h5>-->
      <hr>
      <p><a href="atualizar.php?id=<?=$produto["id"]?>">Editar</a> <a class="excluir" href="excluir.php?id=<?=$produto["id"]?>">Excluir</a></p>
    </article>
    <?php endforeach;
    ?>

  </div>

  <script src="../js/confirma-exclusao.js"></script>

</body>
</html>