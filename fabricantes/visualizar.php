<?php
require_once '../src/funcoes-fabricantes.php';

$listaDeFabricantes = lerFabricantes($conexao);

//var_dump($listaDeFabricantes);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Fabricantes - Visualização</title>
  <style>

    table {
      border-collapse: collapse;
      width: 40%;
      border: 1px solid #ccc;
    }

    th {
      background-color: #f2f2f2;
      border: 1px solid #ccc;
      padding: 8px;
      text-align: left;
    }

    td {
      border: 1px solid #ccc;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

  </style>
</head>
<body>
  <h1>Fabricantes | SELECT <a href="../index.php">Home</a></h1>
  <hr>
  <p><a href="inserir.php">Inserir novo fabricante</a></p>
  <h2>Lendo e carregando todos os fabricantes</h2>

  <table>
    <caption>Lista de Fabricantes</caption>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Operções</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($listaDeFabricantes as $fabricante) : ?>
      <tr>
        <td><?=$fabricante['id']?></td>
        <td><?=$fabricante['nome']?></td>
        <td><a href="#">Editar</a> <a href="#">Excluir</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>