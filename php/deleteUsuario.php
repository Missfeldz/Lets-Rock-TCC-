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
    
    $stmt = $conexao->prepare("Delete FROM musico WHERE email = :email");
    $stmt->bindValue(":email", $_SESSION["email"]);
    $stmt->execute();
    
    header("location: ../HTML/");
    
        
   
?>