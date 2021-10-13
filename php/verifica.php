<?php
    date_default_timezone_set("America/Sao_Paulo");

    try{
        $conexao = new PDO("mysql: host=localhost; port=3306; dbname=letsbd","root","");
    }catch(PDOExeption $e){
        echo $e->getMessage();
    }
    
    $stmt = $conexao->prepare("select * from musico where email = :email and senha = :senha");
    $stmt->bindValue(":email", $_POST["email"]);
    $stmt->bindValue(":senha", $_POST["senha"]);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if( !empty($resultado) ){
        
        session_start();
        $_SESSION["usuario"] = $resultado[0]["nome"];
        $_SESSION["email"] = $resultado[0]["email"];
        $_SESSION["pais"] = $resultado[0]["pais"];
        $_SESSION["estado"] = $resultado[0]["estado"];
        $_SESSION["cidade"] = $resultado[0]["cidade"];
        
        header("location: dashbord.php");
    }else{
        header("location: ../HTML/login.html");
    }
?>