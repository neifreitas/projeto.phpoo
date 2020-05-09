<?php
//Abrir conexao com o MySQL
$conn = mysqli_connect('localhost', 'root', '', 'livro');

//Definir a consulta a ser realizada
$query = 'SELECT codigo, nome FROM famosos';

//Enviar a consulta ao bd
$result = mysqli_query($conn, $query);

//Exibir o resultado da pesquisa
if($result){
    while($row = mysqli_fetch_assoc($result)){
        echo $row['codigo'] . ' - ' . $row['nome'] . "<br> \n";
    }
}

mysqli_close($conn);
