<?php

require_once 'classes/Pessoa.php';
try{
    if(!empty($_REQUEST['action'])){
        if($_REQUEST['action'] == 'edit'){
            $id = (int) $_GET['id'];
            $pessoa = Pessoa::find($id);
        }
        elseif ($_REQUEST['action'] == 'save') {
            $pessoa = $_POST;
            Pessoa::save($pessoa);
            header("Location: pessoa_list.php");
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
}
catch(Exception $e){
    print $e->getMessage();
}

require_once 'classes/Cidade.php';

// Usa o template para apresentar o formulário preenchido
$form = file_get_contents('html/form.html');
$form = str_replace('{id}', $pessoa['id'], $form);
$form = str_replace('{nome}', $pessoa['nome'], $form);
$form = str_replace('{endereco}', $pessoa['endereco'], $form);
$form = str_replace('{bairro}', $pessoa['bairro'], $form);
$form = str_replace('{telefone}', $pessoa['telefone'], $form);
$form = str_replace('{email}', $pessoa['email'], $form);
$form = str_replace('{id_cidade}', $pessoa['id_cidade'], $form);
$form = str_replace('{cidades}', Cidade::all($pessoa['id_cidade']), $form);
print $form

?>