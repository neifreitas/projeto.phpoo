<?php
require_once '../classes/Preferencias.php';

// Obtém uma instância
$p1 = Preferencias::getInstance();
print 'A linguagem é: ' . $p1->getData('language') . "<br> \n";

// Altera um valor no objeto
$p1->setData('language', 'pt-br');
print 'A linguagem é: ' . $p1->getData('language') . "<br> \n";

// Obtém a mesma instancia
$p2 = Preferencias::getInstance();
print 'A linguagem é: ' . $p2->getData('language') . "<br> \n";

// Descomentar para gravar o valor
$p1->save();