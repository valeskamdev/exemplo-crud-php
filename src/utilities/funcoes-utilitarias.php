<?php

function formatarPreco(float $preco) : string {
  return number_format($preco, 2, ",", ".");
}