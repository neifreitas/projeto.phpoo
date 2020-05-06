<?php

class ContaCorrente extends Conta
{
    protected $limite;

    public function __construct($agencia, $conta, $saldo, $limite)
    {
        parent::__construct($agencia, $conta, $saldo);
        $this->limite = $limite;
    }

    public function retirar($quantia)
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