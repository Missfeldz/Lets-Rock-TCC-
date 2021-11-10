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
     
    $stmt3 = $conexao->prepare("insert into banda_genero (idbanda, idgenero) VALUES (:idbanda, :idgenero)");
    $stmt3->bindValue(":idgenero", $_POST["idgenero"]);
    $stmt3->bindValue(":idbanda", $_POST["idbanda"]);
    $stmt3->execute();
    
    header("location: dashbord.php");
?>