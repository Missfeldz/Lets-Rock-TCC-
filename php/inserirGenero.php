<?php
    date_default_timezone_set("America/Sao_Paulo");

    try{
        $conexao = new PDO("mysql: host=localhost; port=3306; dbname=letsbd","root","");
    }catch(PDOExeption $e){
        echo $e->getMessage();
    }
    
    $stmt = $conexao->prepare("insert into genero (descGen) VALUES (:genero)");
    $stmt->bindValue(":genero", $_POST["genero"]);
    $stmt->execute();
    
    header("location: admin.php");
    
        
   
?>