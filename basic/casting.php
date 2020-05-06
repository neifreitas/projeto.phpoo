<?php
# Utilizando uma classe standard do PHP
$produto = new stdClass;
$produto->descricao = 'Chocolate Amargo';
$produto->estoque = 100;
$produto->preco = 7;

$vetor1 = (array) $produto; // Converte um objeto em um array
print $vetor1['descricao'] . "<br>\n";

$vetor2 = ['descricao' => 'Café', 'estoque' => 100, 'preco' => 7];
$produto2 = (object) $vetor2; // Converte um vetor em objeto
print $produto2->descricao . "<br>\n";

?>