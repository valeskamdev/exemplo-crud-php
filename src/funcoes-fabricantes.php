<?php

global $conexao;
require_once "conecta.php";

// Usada em fabricantes/visuzlizar.php
function lerFabricantes(PDO $conexao) {
  $sql = "SELECT * FROM  fabricantes ORDER BY nome";

  try {
    // Método prepare(): Faz uma preparação para a execução de uma instrução SQL
    $consulta = $conexao->prepare($sql);

    // Método execute(): Executa uma instrução no banco de dados
    $consulta->execute();

    // Método fetchAll(): Retorna um array associativo contendo todas as linhas dos resultados
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
  } catch (Exception $e) {
    die("Erro: " . $e->getMessage());
  }
  return $resultado;
}

$dados = lerFabricantes($conexao);
var_dump($dados);