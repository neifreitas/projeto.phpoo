<?php
try{
    //Instancia objeto PDO com a conexão no MySQL
    $conn = new PDO('mysql:host=localhost;dbname=livro','root','');

    //Executa as instruções SQL
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (8, 'PDO - Érico Veríssimo')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (9, 'PDO - Jonh Lennon')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (10, 'PDO - DMahatma Gandhi')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (11, 'PDO - Ayrton Senna')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (12, 'PDO - Charlie Chaplin')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (13, 'PDO - Anita Garibaldi')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (14, 'PDO - Mario Quintana')");
    $conn = null;

    echo "Query executada com sucesso";
}
catch(PDOException $e){
    echo "Falhou: " . $e.getMessage() . "\n";
}