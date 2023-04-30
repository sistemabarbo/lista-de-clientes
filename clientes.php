<?php 
include('conexao.php');
?>


<html>
<head>
    <link rel="stylesheet" href="css/index.css">
    <title>teste</title>
</head>

<body>
<?php 

echo "<h2>para criar esse projeto, utilizei html, css, javascrip, php, banco de dados mysql, servidor xampp.</h2>";


?>

    <!-- FORMULARIO PARA CADASTRAR CLIENTES NO BANCO DE DADOS -->

    <form>
        <input name="txtpesquisar" type="search" placeholder="Pesquisar">
        <button type="submit" name="buttonPesquisar">Pesquisar</button>
    </form>
    <div class="conteiner">
        <button  onclick="turnon()">Cadastrar</button>
        <div id="ids">
     
        </div>
        
    </div>
<?php 
//BUTTON PARA PESQUISAR CLIENTES

if(isset($_GET['buttonPesquisar'])){
$nome = $_GET['txtpesquisar'];
$query = "select * from cliente where nome = '$nome' order by nome asc";
}else{
    $query = "select * from cliente order by nome asc;";
}

$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

    if($row == ''){
      $nome = $dado["nome"];
      $email = $dado["email"];
      $data = $dado["data"];
      $cpf= $dado["cpf"];
    }else{
        
    
    ?>

<!-- TABELA PARA LISTA CLIENTES -->
    <table>
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Data nascimento</th>
            <th>CPF</th>
            <th>Acoes</th>
        </thead>
        <tbody>
   <?php 
   while($res_1 = mysqli_fetch_array($result)){
      $nome = $res_1["nome"];
      $email = $res_1["email"];
      $data = $res_1["data"];
      $cpf = $res_1["cpf"];
      $id = $res_1["id"];

  $data2 = implode('/', array_reverse(explode ('-', $data)));

?>

<tr>
    <td><?php echo $nome; ?></td>
    <td><?php echo $email; ?></td>
    <td><?php echo $data2; ?></td>
    <td><?php echo $cpf ?></td>
    <td>

       <!-- LINKS PARA EDITAR E EXCLUIR DADOS  -->

       <a class="links" href="edite.php?id=$res_1[id]">agora</a>
        <a href="clientes.php?func=deleta&id=<?php echo $id; ?>">Excluir</a>
        
    </td>
</tr>
<?php
   }
   ?>
   </tbody>
    </table>

<?php
   }
   ?>



    <script>
        // SCRIPT PARA O FORMULÁRIO DE CADASTRO

        function turnon() {
            let name = document.getElementById('ids');
            name.innerHTML = `<form method="POST">
            <input name="nome" type="text" placeholder="Nome completo" required>
            <input name="email" type="text" placeholder="E-mail" required>
            <input name="data" type="text" placeholder="Data nascimento" required>
            <input name="cpf" type="text" placeholder="CPF" required>
            <button name="button" onclick="clicks()" type="submit">salvar</button>
            <button onclick="turnoff()">Fechar</button>
        </form>`;
     
        }
        function turnoff() {
            let namess = document.getElementById('ids');
            namess.innerHTML = "";
        }
     
    </script>
</body>
</html>

<?php 

// BUTTON PARA ENVIAR OS DADOS DO FORMULÁRIO
if(isset($_POST['button'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    echo "<script language='javascript'> window.location='clientes.php'; </script>";
    $query_verificar = "select * from cliente where cpf = '$cpf' ";

    $result_verificar = mysqli_query($conexao, $query_verificar);
    
    $row_verificar = mysqli_num_rows($result_verificar);

    if($row_verificar > 0){
       echo "<script language='javascript'> window.alert('cpf ja cadastrado'); </script>";
       exit();
    }

    // INSERINDO DADOS NO BANCO DE DADOS

    $query = "INSERT into cliente (nome, email, cpf, data) VALUES ('$nome', '$email','$cpf', curDate() )";
    $result = mysqli_query($conexao, $query);

    if($result == ''){
        echo "<script language='javascript'> window.alert('Ocorreu um erro'); </script>";
    } else {
        echo "<script language='javascript'> window.alert('Salvo'); </script>";
    }
    
}
?>

<?php 
// BUTTON PARA DELETAR DADOS
if(@$_GET['func'] == 'deleta'){
    $id = $_GET['id'];
    $query = "DELETE FROM cliente where id = '$id'";
    mysqli_query($conexao, $query);
    echo "<script language='javascript'> window.location='clientes.php'; </script>";
}
?>

<?php 
//BUTTON PARA EDITAR DADOS
if(isset($_POST['buttonE'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data = $_POST['data'];
    $cpf = $_POST['cpf'];

    $query_verificar = "select * from cliente where cpf = '$cpf' ";

    $result_verificar = mysqli_query($conexao, $query_verificar);
    
    $row_verificar = mysqli_num_rows($result_verificar);

    if($row_verificar > 0){
       echo "<script language='javascript'> window.onleforeunload = turnon(); </script>";
       exit();
    }
}
    ?>













    