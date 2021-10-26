<?php
    session_start();
    if( !isset($_SESSION["usuario"],$_SESSION["email"]) ) {
        header("location: ../HTML/");
    }
    
?>

<?php 
    //DB Connection//
     date_default_timezone_set("America/Sao_Paulo");

     try{
         $conexao = new PDO("mysql: host=localhost; port=3306; dbname=letsbd","root","");
     }catch(PDOExeption $e){
         echo $e->getMessage();
     }
?>

<?php
    $stmt = $conexao->prepare("update banda set nomeBanda = :nomeBanda, estadoBanda = :estadoBanda, cidadeBanda = :cidadeBanda where idbanda = :idbanda");
    $stmt->bindValue(":nomeBanda", $_POST["nomeBanda"]);
    $stmt->bindValue(":estadoBanda", $_POST["estado"]);
    $stmt->bindValue(":cidadeBanda", $_POST["cidade"]);
    $stmt->bindValue(":idbanda", $_POST["idbanda"]);
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
    <h1>Os Dados da Banda foram alterados !</h1>
    <button onclick="return verificaAlterar()">Voltar</button>
</body>
</html>