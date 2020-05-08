<?php
class Software
{
    private $id;
    private $nome;
    // Atributo estatico
    private static $contador;

    function __construct($nome)
    {
        self::$contador ++;
        $this->id = self::$contador;
        $this->nome = $nome;
        print "Software {$this->id} - {$this->nome} <br>\n";
    }

    // Método estatico
    public static function getContador()
    {
        return self::$contador;
    }
}

// Criação de novos objetos
new Software('Dia');
new Software('Gimp');
new Software('Gnumeric');
echo 'Quantidade criada = ' . Software::getContador() . "<br>\n";
print_r(get_class_methods('Software'));