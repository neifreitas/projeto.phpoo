<?php

// Esta é uma classe abstrata (superclasse), ou seja, ela não pode ser instanciada diretamente
// Ela é a base das classes ContaCorrente e ContaPoupanca

abstract class Conta
{
    // Atributo declarado como protected pode ser alterado somente de dentro da
    // classe (recomendável) ou pelas classes filhas.
    protected $agencia;
    protected $conta;
    protected $saldo;

    public function __construct($agencia, $conta, $saldo)
    {
        $this->agencia = $agencia;
        $this->conta = $conta;
        
        if($saldo > 0){
            $this->saldo = $saldo;
        }
    }

    public function getInfo()
    {
        return "Agencia: {$this->agencia}, Conta: {$this->conta}";
    }

    public function depositar($quantia)
    {
        if ($quantia > 0) {
            $this->saldo += $quantia;
        }
    }
    
    public function getSaldo()
    {
        return $this->saldo;
    }

    // Método abstrato: neste caso a implementação do código deve ser feita
    // na classe filha. Se o método não for implementado um erro é exibido 
    abstract function retirar($quantia);
}