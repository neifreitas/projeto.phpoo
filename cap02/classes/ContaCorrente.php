<?php

class ContaCorrente extends Conta
{
    protected $limite;

    public function __construct($agencia, $conta, $saldo, $limite)
    {
        parent::__construct($agencia, $conta, $saldo);
        $this->limite = $limite;
    }

    // Método final: um método final não pode ser sobrescrito em uma eventual classe filha
    public final function retirar($quantia)
    {
        if (($this->saldo + $this->limite) >= $quantia) {
            $this->saldo -= $quantia; //Retirada permitida
        } 
        else{
            return false; //Retirada não permitida
        }
        return true;
    }
}