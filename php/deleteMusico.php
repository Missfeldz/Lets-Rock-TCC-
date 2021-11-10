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

     $stmt = $conexao->prepare("update musico_banda set estado = 'inativo' where idmusico = :idmusico and idbanda = :idbanda");
     $stmt->bindValue(":idmusico", $_GET["idmusico"]);
     $stmt->bindValue(":idbanda", $_GET["idbanda"]);
     $stmt->execute();


     header("location: dashBanda.php");
?>