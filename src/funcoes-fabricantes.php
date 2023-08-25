<?php
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

function inserirFabricante(PDO $conexao, string $nome): void
{

  // :qualquerCoisa -> indica um "named parameter" (parâmetro nomeado)
  // named parameters são usados para evitar SQL Injection
  $sql = "INSERT INTO fabricantes (nome) VALUES (:nome)";

  try {
    $consulta = $conexao->prepare($sql);

    // método bindValue(): Associa um valor a um parâmetro, neste caso, o parâmetro :nome
    // que assumirá o valor da variável $nome, e será do tipo string (PDO::PARAM_STR)
    $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);

    $consulta->execute();
  } catch (Exception $e) {
    die("Erro ao inserir: " . $e->getMessage());
  }
}