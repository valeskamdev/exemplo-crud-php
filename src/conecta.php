<?php

// Script de conexão ao servidor de banco de dados

// Variáveis de conexão
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "vendas";

// Conexão ao banco de dados (API/Driver)
// instância PDO representando uma conexão com um banco de dado
$conexao = new PDO(
  "mysql:host=$servidor;dbname=$banco;charset=utf8",
  $usuario,
  $senha
);

// Habiltar a verificação e sinalização de erros (exceções)
try {
  // Representa uma conexão entre PHP e um servidor de banco de dados
  $conexao->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
  );
} catch (Exception $e) {
  /* Execeptioné uma classe/tipo de dados voltado
   para tratamento de exceções (erros) */
  die("Deu ruimmm!: " . $e->getMessage()); // interrompe a execução do script e exibe a mensagem de erro
}