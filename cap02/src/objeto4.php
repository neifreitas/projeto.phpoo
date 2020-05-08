<?php
# Classe V4 - com propriedades privadas e com métodos get/set para manipulacao das propriedades
class Produto
{
    private $descricao;
    private $estoque;
    private $preco;

    public function setDescricao($descricao)
    {
        if(is_string($descricao)){
            $this->descricao = $descricao;
        }
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setEstoque($estoque)
    {
        if(is_numeric($estoque)){
            $this->estoque = $estoque;
        }
    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    public function setPreco($preco)
    {
        if(is_numeric($preco) AND $preco > 0){
            $this->preco = $preco;
        }
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function aumentarEstoque($unidades)
    {
        if(is_numeric($unidades) AND $unidades > 0){
            $this->estoque += $unidades;
        }
    }

    public function diminuirEstoque($unidades)
    {
        if(is_numeric($unidades) AND $unidades > 0){
            $this->estoque -= $unidades;
        }
    }

    public function reajustarPreco($percentual)
    {
        if(is_numeric($percentual) AND $percentual >= 0){
            $this->preco *= (1 + ($percentual / 100));
        }
    }
}

$p1 = new Produto;
$p1->setDescricao('Chocolate');
$p1->setEstoque(10);
$p1->setPreco(8);

print "O estoque de {$p1->getDescricao()} é {$p1->getEstoque()} <br>\n";
print "O preço de {$p1->getDescricao()} é {$p1->getPreco()} <br>\n";

$p1->aumentarEstoque(10);
$p1->diminuirEstoque(5);
$p1->reajustarPreco(50);

print "O estoque de {$p1->getDescricao()} é {$p1->getEstoque()} <br>\n";
print "O preço de {$p1->getDescricao()} é {$p1->getPreco()} <br>\n";
