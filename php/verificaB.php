<?php
    date_default_timezone_set("America/Sao_Paulo");

    try{
        $conexao = new PDO("mysql: host=localhost; port=3306; dbname=letsbd","root","");
    }catch(PDOExeption $e){
        echo $e->getMessage();
    }
    
    $stmt = $conexao->prepare("insert into banda (nomeBanda,paisBanda,estadoBanda,cidadeBanda) VALUES (:nomeBanda,:paisBanda,:estadoBanda,:cidadeBanda)");
    $stmt->bindValue(":nomeBanda", $_POST["nomeBanda"]);
    $stmt->bindValue(":paisBanda", $_POST["paisBanda"]);
    $stmt->bindValue(":estadoBanda", $_POST["estadoBanda"]);
    $stmt->bindValue(":cidadeBanda", $_POST["cidadeBanda"]);
    $stmt->execute();
    
    header("location: dashbord.php");
    
        
   
?>