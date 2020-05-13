<?php
Class Cidade{
public static function all($id = null)
{
    $output = '';
    $conn = new PDO("mysql:dbname=livro;host=localhost","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = 
    $result = $conn->query('SELECT id, nome FROM cidade');

    foreach($result as $row){
        $check = ($row['id'] == $id) ? 'selected=1' : '';
        $output .= "<option $check value='{$row['id']}'>{$row['nome']}</option>";
    }

    return $output;
}
}