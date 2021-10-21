<?php

    //DB Connection// 
    date_default_timezone_set("America/Sao_Paulo");

    try{
        $conexao = new PDO("mysql: host=localhost; port=3306; dbname=letsbd","root","");
    }catch(PDOExeption $e){
        echo $e->getMessage();
    }
    
    //First Statment//
    //Select values and confirm login//
    $stmt = $conexao->prepare("select idmusico, nome, email, senha, estado, cidade from musico where email = :email and senha = :senha");
    $stmt->bindValue(":email", $_POST["email"]);
    $stmt->bindValue(":senha", $_POST["senha"]);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Check and start a SESSION//
    if( !empty($resultado) ){
        
        session_start();
        
        $_SESSION["id"] = $resultado[0]["idmusico"];
        $_SESSION["usuario"] = $resultado[0]["nome"];
        $_SESSION["email"] = $resultado[0]["email"];
        $_SESSION["senha"] = $resultado[0]["senha"];
        $_SESSION["estado"] = $resultado[0]["estado"];
        $_SESSION["cidade"] = $resultado[0]["cidade"];
        
        header("location: dashbord.php");
    }else{
        header("location: ../HTML/login.html");
    }
?>