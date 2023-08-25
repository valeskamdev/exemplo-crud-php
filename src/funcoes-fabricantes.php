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

// Usada em  fabricantes/inserir.php
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

// Usada em  fabricantes/atualizar.php
function lerUmFabricantes(PDO $conexao, int $id) {
  $sql = "SELECT * FROM  fabricantes WHERE id = :id";

  try {
    $consulta = $conexao->prepare($sql);

    // Método bindValue(): Associa um valor a um parâmetro, neste caso, o parâmetro :id
    // que assumirá o valor da variável $id, e será do tipo inteiro (PDO::PARAM_INT)
    $consulta->bindValue(":id", $id, PDO::PARAM_INT);

    $consulta->execute();

    // Método fetch(): Retorna uma única linha do resultado como um array associativo
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

  } catch (Exception $e) {
    die("Erro ao carregar: " . $e->getMessage());
  }
  return $resultado;
}

function atualizarFabricante(PDO $conexao, string $nome, int $id) : void {
  $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";

  try {
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
    $consulta->bindValue(":id", $id, PDO::PARAM_INT);
    $consulta->execute();
  } catch (Exception $e) {
    die("Erro ao atualizar: " . $e->getMessage());
  }
}