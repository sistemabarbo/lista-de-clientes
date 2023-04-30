<?php 
// SALVANDO OS DADOS EDITADOS

include_once('clientes.php');

if(isset($_POST['update']))
{
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data = $_POST['data'];
    $cpf = $_POST['cpf'];

    $sqlUpdate = "UPDATE cliente SET nome='$nome',email='$email',data='$data', cpf='$cpf'
    WHERE id='$id'";

    $result = $conexao->query($sqlUpdate);


}


?>