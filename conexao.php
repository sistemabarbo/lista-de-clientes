<?php
// CONEXAO COM BANCO DE DADOS

define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('BD', 'sistema');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, BD) or die ('não conectou!!');

?>