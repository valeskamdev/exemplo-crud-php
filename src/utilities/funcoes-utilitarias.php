<?php

function formatarPreco(float $preco) : string {
  return number_format($preco, 2, ",", ".");
}

function calcularTotal(float $preco, int $quantidade) : string
{
  return formatarPreco($preco * $quantidade);
}
