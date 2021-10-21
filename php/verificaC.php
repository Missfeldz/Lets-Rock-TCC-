<?php

    //DB Connection// 
    date_default_timezone_set("America/Sao_Paulo");

    try{
        $conexao = new PDO("mysql: host=localhost; port=3306; dbname=letsbd","root","");
    }catch(PDOExeption $e){
        echo $e->getMessage();
    }
    
    //First Statment//
    //Insert values in musician column//
    $stmt = $conexao->prepare("insert into musico (nome,email,senha,estado,cidade) VALUES (:nome, :email, :password,:estado,:cidade)");
    $stmt->bindValue(":nome", $_POST["nome"]);
    $stmt->bindValue(":email", $_POST["email"]);
    $stmt->bindValue(":password", $_POST["password"]);
    $stmt->bindValue(":estado", $_POST["estado"]);
    $stmt->bindValue(":cidade", $_POST["cidade"]);
    $stmt->execute();
    
    header("location: ../HTML/login.html");
    
?>