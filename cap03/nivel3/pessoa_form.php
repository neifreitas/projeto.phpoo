<?php

if(!empty($_REQUEST['action'])){
    $conn = mysqli_connect('localhost', 'root', '', 'livro');
    
    if($_REQUEST['action'] == 'edit'){
        $id = (int) $_GET['id'];
        $result = mysqli_query($conn, "SELECT * FROM pessoa WHERE id = '{$id}'");
        $pessoa = mysqli_fetch_assoc($result);
    }
    elseif ($_REQUEST['action'] == 'save') {
        $pessoa = $_POST;
        
        if(empty($_POST['id'])){
            $result = mysqli_query($conn, "SELECT max(id) as next FROM pessoa");
            $next = (int) mysqli_fetch_assoc($result)['next'] + 1;
            $sql = "INSERT INTO pessoa (id,
                                        nome,
                                        endereco,
                                        bairro,
                                        telefone,
                                        email,
                                        id_cidade)
                                VALUES ('{$next}',
                                        '{$pessoa['nome']}',
                                        '{$pessoa['endereco']}',
                                        '{$pessoa['bairro']}',
                                        '{$pessoa['telefone']}',
                                        '{$pessoa['email']}',
                                        '{$pessoa['id_cidade']}')";
            
            $result = mysqli_query($conn, $sql);
        }
        else{
            $sql = "UPDATE pessoa SET nome = '{$pessoa['nome']}',
                                        endereco = '{$pessoa['endereco']}',
                                        bairro = '{$pessoa['bairro']}',
                                        telefone = '{$pessoa['telefone']}',
                                        email = '{$pessoa['email']}',
                                        id_cidade = '{$pessoa['id_cidade']}'
                                    WHERE id = '{$pessoa['id']}'";
            
            $result = mysqli_query($conn, $sql);
        }
        header("Location: pessoa_list.php");
        print($result) ? 'Registro salvo com sucesso!' : mysqli_error($conn);
        mysqli_close($conn);
    }
}
else{
    $pessoa = [];
    $pessoa['id'] = '';
    $pessoa['nome'] = '';
    $pessoa['endereco'] = '';
    $pessoa['bairro'] = '';
    $pessoa['telefone'] = '';
    $pessoa['email'] = '';
    $pessoa['id_cidade'] = '';
}

require_once 'lista_combo_cidades.php';

// Usa o template para apresentar o formulário preenchido
$form = file_get_contents('html/form.html');
$form = str_replace('{id}', $pessoa['id'], $form);
$form = str_replace('{nome}', $pessoa['nome'], $form);
$form = str_replace('{endereco}', $pessoa['endereco'], $form);
$form = str_replace('{bairro}', $pessoa['bairro'], $form);
$form = str_replace('{telefone}', $pessoa['telefone'], $form);
$form = str_replace('{email}', $pessoa['email'], $form);
$form = str_replace('{id_cidade}', $pessoa['id_cidade'], $form);
$form = str_replace('{cidades}', lista_combo_cidades($pessoa['id_cidade']), $form);
print $form

?>