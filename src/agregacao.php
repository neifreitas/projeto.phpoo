<?php
require_once '../classes/Cesta.php';
require_once '../classes/Produto.php';

// Criação da cesta
$c1 = new Cesta;

// Agregação dos produtos
$c1->addItem($p1 = new Produto('Chocolate', 10, 5));
$c1->addItem($p1 = new Produto('Café', 100, 7));
$c1->addItem($p1 = new Produto('Mostarda', 50, 3));

foreach($c1->getItens() as $item){
    print 'Item: ' . $item->getDescricao() . "<br>\n";
}