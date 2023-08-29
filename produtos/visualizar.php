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
      gap: 16px;
      width: 80%;
      margin: auto;
    }

    .produto {
      padding: 1rem;
      box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;

    }
  </style>
</head>
<body>
  <h1>Produtos | SELECT <a href="../index.php">Home</a></h1>

    <hr>
  <h2>Lendo e carregando todos os produtos</h2>

  <p><a href="inserir.php">Inserir novo produto</a></p>

  <div class="produtos">

    <article class="produto">
      <h3>Nome do produto...</h3>
      <p><b>Preço:</b>......</p>
      <p><b>Quantidade</b>...</p>
      <p><b>Descrição</b>...</p>
    </article>

    <article class="produto">
      <h3>Nome do produto...</h3>
      <p><b>Preço:</b>......</p>
      <p><b>Quantidade</b>...</p>
      <p><b>Descrição</b>...</p>
    </article>

  </div>

</body>
</html>