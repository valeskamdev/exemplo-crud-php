<?php
require_once "../src/funcoes-fabricantes.php";

// obtendo e sanitizando o id que vem pela URL
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$fabricante = lerUmFabricantes($conexao, $id);
deletarFabricante($conexao, $id);
header("location:visualizar.php");
