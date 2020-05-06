<?php
class ContaPoupanca extends Conta
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