<?php

// Uma classe final é uma classe que não pode ser uma superclasse, ou seja, 
// não pode ser base para construção de outra classe em uma estrutura de herança.

final class ContaPoupanca extends Conta
{
    public function retirar($quantia)
    {
        if ($this->saldo >= $quantia) {
            $this->saldo -= $saldo;
        } else {
            return false; // Retirada não permitida
        }
        return true; // Retirada permitida
    }
}