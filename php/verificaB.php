<?php
    session_start();
    if( !isset($_SESSION["usuario"],$_SESSION["email"]) ) {
        header("location: ../HTML/");
    }
    
?>

<?php
    date_default_timezone_set("America/Sao_Paulo");

    try{
        $conexao = new PDO("mysql: host=localhost; port=3306; dbname=letsbd","root","");
    }catch(PDOExeption $e){
        echo $e->getMessage();
    }
    
    $stmt = $conexao->prepare("insert into banda (idlider,nomeBanda,estadoBanda,cidadeBanda) VALUES (:idlider,:nomeBanda,:estadoBanda,:cidadeBanda)");
    $stmt->bindValue(":idlider", $_SESSION["id"]);
    $stmt->bindValue(":nomeBanda", $_POST["nomeBanda"]);
    $stmt->bindValue(":estadoBanda", $_POST["estado"]);
    $stmt->bindValue(":cidadeBanda", $_POST["cidade"]);
    $stmt->execute();
    

    header("location: dashbord.php");
?>