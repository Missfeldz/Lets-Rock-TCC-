<?php
    session_start();
    if( !isset($_SESSION["usuario"],$_SESSION["email"]) ) {
        header("location: ../HTML/");
    }
?>

<?php
    date_default_timezone_set("America/Sao_Paulo");

    try{
        $conexao = new PDO("mysql: host=localhost; port=3306; dbname=letsbd","root","");
    }catch(PDOExeption $e){
        echo $e->getMessage();
    }
    
    $stmt = $conexao->prepare("update musico set nome = :nome, estado = :estado, cidade = :cidade where email = :email");
    $stmt->bindValue(":nome", $_POST["nome"]);
    $stmt->bindValue(":estado", $_POST["estado"]);
    $stmt->bindValue(":cidade", $_POST["cidade"]);
    $stmt->bindValue(":email", $_SESSION["email"]);
    $stmt->execute();    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Scripts/Alerts.js"></script>
    <title>Dados Alterados</title>
</head>
<body>
    <h1>Seus Dados foram alterados !</h1>
    <button onclick="return verificaAlterar()">Voltar</button>
</body>
</html>