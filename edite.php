
<?php
// EDIÇÃO DOS DADOS JÁ CADASTRADO

if(!empty($_GET['id'])){
    include_once('clientes.php');
    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM cliente WHERE id = '$id' ";

    $result = $conexao->query($sqlSelect);
    print_r($nome);
    if($result->num_rows > 0) {

    while($res_1 = mysqli_fetch_assoc($result)){
       $nome = $res_1["nome"];
       $email = $res_1["email"];
       $data = $res_1["data"];
       $cpf = $res_1["cpf"];
       $id = $res_1["id"];

   $data2 = implode('/', array_reverse(explode ('-', $data)));


    }
} else {
    // no noting
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
<div class="conteiner">
        <h2>Cadastrar</h2>
        <div id="ids">

        <!-- FORMULARÁRIO JÁ PREENCHIDO COM OS DADOS -->
   <form action="saveEdit.php" method="POST">
            <input name="nome" type="text" placeholder="Nome completo" value="<?php echo $nome; ?>" required>
            <input name="email" type="text" placeholder="E-mail" value="<?php echo $email; ?>" required>
            <input name="data" type="text" placeholder="Data nascimento" required>
            <input name="cpf" type="text" placeholder="CPF" value="<?php echo $cpf ?>" required>
            <button name="update" type="submit">editar</button>
            <button onclick="turnoff()">Cancelar</button>
        </form>
        </div>
</div>
    <a href="clientes.php">Recomeçar</a>
</body>
</html>
