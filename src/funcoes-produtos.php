<?php

require_once "conecta.php";

function lerProdutos(PDO $conexao): array
{
    // Versão 1 (dados somente da tabela produtos)
    // $sql = "SELECT nome, preco, quantidade FROM produtos ORDER BY nome";

    // Versão 2 (dados das duas tabelas: produtos e fabricantes)
    $sql = "SELECT produtos.id,
            produtos.nome produto,
            produtos.preco,
            produtos.quantidade,
            fabricantes.nome fabricante,
            produtos.preco * produtos.quantidade total
        FROM produtos INNER JOIN fabricantes
        ON produtos.fabricante_id = fabricantes.id
        ORDER BY produto";


    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die("Erro ao carregar produtos: " . $e->getMessage());
    }

    return $resultado;
}

function inserirProduto(
  PDO $conexao,
  string $nome,
  float $preco,
  int $quantidade,
  int $fabricanteId,
  string $descricao
): void {
    $sql = "INSERT INTO produtos(nome, preco, quantidade, fabricante_id, descricao)
            VALUES (:nome, :preco, :quantidade, :fabricante_id, :descricao)";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(
          ":preco",
          $preco,
          PDO::PARAM_STR
        ); // PDO::PARAM_STR é para campos numéricos (ATUALMENTE)
        $consulta->bindValue(":quantidade", $quantidade, PDO::PARAM_INT);
        $consulta->bindValue(":fabricante_id", $fabricanteId, PDO::PARAM_INT);
        $consulta->bindValue(":descricao", $descricao, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $e) {
        die("Erro ao inserir: " . $e->getMessage());
    }
}

function lerUmProduto(PDO $conexao, int $id): array
{
    $query = "SELECT * FROM produtos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($query);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die("Erro ao carregar: " . $e->getMessage());
    }

    return $resultado;
}


function atualizarProduto(
  PDO $conexao,
  int $id,
  string $nome,
  float $preco,
  int $quantidade,
  string $descricao,
  int $fabricanteId
): void {
    $query = "UPDATE produtos 
                SET nome = :nome,
                    preco = :preco,
                    quantidade = :quantidade,
                    descricao = :descricao,
                    fabricante_id = :fabricanteId
                WHERE id = :id";

    try {
        $consulta = $conexao->prepare($query);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(":preco", $preco, PDO::PARAM_STR);
        $consulta->bindValue(":quantidade", $quantidade, PDO::PARAM_INT);
        $consulta->bindValue(":descricao", $descricao, PDO::PARAM_STR);
        $consulta->bindValue(":fabricanteId", $fabricanteId, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $e) {
        die("Erro ao atualizar: " . $e->getMessage());
    }
}

function excluirProduto(PDO $conexao, int $id): void
{
    $query = "DELETE FROM produtos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($query);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $e) {
        die("Erro ao excluir: " . $e->getMessage());
    }
}