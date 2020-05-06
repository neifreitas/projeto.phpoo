<?php
# Classe V5 - com propriedades privadas, com método construtor e métodos auxiliares para manipulacao das propriedades
class Produto
{
    private $descricao;
    private $estoque;
    private $preco;

    public function __construct($descricao, $estoque, $preco)
    {
        if(is_string($descricao))
        {
            $this->descricao = $descricao;
        }

        if(is_numeric($estoque))
        {
            $this->estoque = $estoque;
        }
        
        if(is_numeric($preco) AND $preco > 0)
        {
            $this->preco = $preco;
        }
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function aumentarEstoque($unidades)
    {
        if(is_numeric($unidades) AND $unidades > 0)
        {
            $this->estoque += $unidades;
        }
    }

    public function diminuirEstoque($unidades)
    {
        if(is_numeric($unidades) AND $unidades > 0)
        {
            $this->estoque -= $unidades;
        }
    }

    public function reajustarPreco($percentual)
    {
        if(is_numeric($percentual) AND $percentual >= 0)
        {
            $this->preco *= (1 + ($percentual / 100));
        }
    }
}

$p1 = new Produto('Chocolate', 10, 8);

print "O estoque de {$p1->getDescricao()} é {$p1->getEstoque()} <br>\n";
print "O preço de {$p1->getDescricao()} é {$p1->getPreco()} <br>\n";

$p1->aumentarEstoque(10);
$p1->diminuirEstoque(5);
$p1->reajustarPreco(50);

print "O estoque de {$p1->getDescricao()} é {$p1->getEstoque()} <br>\n";
print "O preço de {$p1->getDescricao()} é {$p1->getPreco()} <br>\n";

