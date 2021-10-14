<?php
    date_default_timezone_set("America/Sao_Paulo");

    try{
        $conexao = new PDO("mysql: host=localhost; port=3306; dbname=letsbd","root","");
    }catch(PDOExeption $e){
        echo $e->getMessage();
    }
    
    $stmt = $conexao->prepare("insert into musico (nome,email,senha,estado,cidade) VALUES (:nome, :email, :password,:estado,:cidade)");
    $stmt->bindValue(":nome", $_POST["nome"]);
    $stmt->bindValue(":email", $_POST["email"]);
    $stmt->bindValue(":password", $_POST["password"]);
    $stmt->bindValue(":estado", $_POST["estado"]);
    $stmt->bindValue(":cidade", $_POST["cidade"]);
    $stmt->execute();

    $stmt4 = $conexao->prepare("select idmusico from musico where email = :email");
    $stmt4->execute();
    
    $stmt2 = $conexao->prepare("insert into musico_instrumento (idinstrumento, idmusico) VALUES (:idinstrumento, :idmusico)");
    $stmt2->bindValue(":idinstrumento", $_POST["idinstrumento"]);
    $stmt2->bindValue(":idmusico", $_POST["idmusico"]);
    $stmt2->execute();

    $stmt3 = $conexao->prepare("insert into musico_genero (idinstrumento, idmusico) VALUES (:idgenero, :idmusico)");
    $stmt3->bindValue(":idgenero", $_POST["idgenero"]);
    $stmt3->bindValue(":idmusico", $_POST["idmusico"]);
    $stmt3->execute();



    header("location: ../HTML/login.html");
    
        
   
?>