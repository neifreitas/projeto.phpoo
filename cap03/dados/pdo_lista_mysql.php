<?php
try{
    $conn = new PDO('mysql:host=localhost;dbname=livro', 'root', '');

    $sql = $conn->prepare("SELECT codigo, nome FROM famosos");
    $sql->execute();

    if($sql->rowCount() > 0){
        $result = $sql->fetchAll();
        foreach($result as $livro){
            echo $livro['codigo'] . ' - ' . $livro['nome'] . "<br> \n";
        }
    }   
    $conn = null;
}
catch(PDOException $e){
    echo "Erro: " . $e.getMessage() . "\n";
}
