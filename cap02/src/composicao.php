<?php
require_once '../classes/Produto.php';
require_once '../classes/Caracteristica.php';

// Criacao dos objetos
$p1 = new Produto('Chocolate', 10, 7);

// Composicao
$p1->addCaracteristica('Cor', 'Branco');
$p1->addCaracteristica('Peso', '2.6 kg');
$p1->addCaracteristica('Potencia', '20 watts RMS');

// Exibindo o objeto
print 'Produto: ' . $p1->getDescricao() . "<br>\n";
foreach($p1->getCaracteristicas() as $c){
    print ' - Caracteristicas: ' . $c->getNome() . " - " . $c->getValor() . "<br>\n";
}
