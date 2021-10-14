<?php
    date_default_timezone_set("America/Sao_Paulo");

    try{
        $conexao = new PDO("mysql: host=localhost; port=3306; dbname=letsbd","root","");
    }catch(PDOExeption $e){
        echo $e->getMessage();
    }
    
    $stmt = $conexao->prepare("insert into banda (nomeBanda,estadoBanda,cidadeBanda) VALUES (:nomeBanda,:estadoBanda,:cidadeBanda)");
    $stmt->bindValue(":nomeBanda", $_POST["nomeBanda"]);
    $stmt->bindValue(":estadoBanda", $_POST["estado"]);
    $stmt->bindValue(":cidadeBanda", $_POST["cidade"]);
    $stmt->execute();

    $stmt2 = $conexao->prepare("insert into banda_genero (banda_idbanda, genero_idgenero) VALUES (:banda_idbanda ,:genero_idgenero)");
    $stmt2->bindValue(":banda_idbanda", $_POST["idbanda"]);
    $stmt2->bindValue(":genero_idgenero", $_POST["idgenero"]);
    $stmt2->execute();

    $stmt3 = $conexao->prepare("insert into musico_banda (idmusico, idbanda, data_entrada, data_saida, idinstrumento, estado) VALUES (:idmusico, :banda_idbanda, :data_entrada, :data_saida, :idinstrumento, :estado)");
    $stmt3->execute();

    
    header("location: dashbord.php");
    
        
   
?>