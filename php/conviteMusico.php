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
?>

<?php
    $stmt = $conexao->prepare("insert into convitemusico (musico_idmusico, banda_idbanda, statusConvite) VALUES (:idmusico, :idbanda, 'aberto')");
    $stmt->bindValue(":idmusico", $_GET["idmusico"]);
    $stmt->bindValue(":idbanda", $_GET["idbanda"]);
    $stmt->execute();

    header("location: dashbord.php");
?>