<?php
class Pessoa{
private static $conn;

public static function getConnection()
{
    if(empty(self::$conn)){
        $conexao = parse_ini_file('config/livro.ini');
        $host = $conexao['host'];
        $name = $conexao['name'];
        $user = $conexao['user'];
        $pass = $conexao['pass'];

        self::$conn = new PDO("mysql:dbname={$name};host={$host}","{$user}","{$pass}");
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return self::$conn;
}

public static function save($pessoa)
{
    $conn = self::getConnection();

    if(empty($pessoa['id'])){
        $result = $conn->query("SELECT max(id) as next FROM pessoa");
        $row = $result->fetch();
        $pessoa['id'] = (int) $row['next'] + 1;

        $sql = "INSERT INTO pessoa (id,                                                       nome,
                            endereco,
                            bairro,
                            telefone,
                            email,
                            id_cidade)
                    VALUES ('{$pessoa['id']}',
                            '{$pessoa['nome']}',
                            '{$pessoa['endereco']}',
                            '{$pessoa['bairro']}',
                            '{$pessoa['telefone']}',
                            '{$pessoa['email']}',
                            '{$pessoa['id_cidade']}')";
    }
    else{
        $sql = "UPDATE pessoa SET nome = '{$pessoa['nome']}',
                            endereco = '{$pessoa['endereco']}',
                            bairro = '{$pessoa['bairro']}',
                            telefone = '{$pessoa['telefone']}',
                            email = '{$pessoa['email']}',
                            id_cidade = '{$pessoa['id_cidade']}'
                    WHERE id = '{$pessoa['id']}'";
    }
    return $conn->query($sql);
}

public static function find($id)
{
    $conn = self::getConnection();

    $result = $conn->query("SELECT * FROM pessoa WHERE id='{$id}'");
    return $result->fetch();
}

public static function delete($id)
{
    $conn = self::getConnection();

    $result = $conn->query("DELETE FROM pessoa WHERE id='{$id}'");
    
    //return $conn->query($sql);
}

public static function all()
{
    $conn = self::getConnection();

    $result = $conn->query("SELECT * FROM pessoa ORDER BY id");

    return $result->fetchAll();
}

}