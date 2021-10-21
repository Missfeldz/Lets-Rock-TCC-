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
    
    session_start();
    if( !isset($_SESSION["usuario"],$_SESSION["email"]) ) {
        header("location: ../HTML/");
    }
    
  

    $stmt2 = $conexao->prepare("insert into musico_instrumento (idinstrumento, idmusico) VALUES (:idinstrumento, :idmusico)");
    $stmt2->bindValue(":idinstrumento", $_POST["idinstrumento"]);
    $stmt2->bindValue(":idmusico", $_SESSION["id"]);
    $stmt2->execute();

     
    $stmt3 = $conexao->prepare("insert into musico_genero (idmusico, idgenero) VALUES (:idmusico, :idgenero)");
    $stmt3->bindValue(":idgenero", $_POST["idgenero"]);
    $stmt3->bindValue(":idmusico", $_SESSION["id"]);
    $stmt3->execute();
    
    header("location: dashbord.php");
?>