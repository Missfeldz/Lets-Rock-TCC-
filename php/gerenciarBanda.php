<?php
    session_start();
    if( !isset($_SESSION["usuario"],$_SESSION["email"]) ) {
        header("location: ../HTML/");
    }
    
?>

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

    $stmt2 = $conexao->prepare("select idmusico, idbanda from musico_banda where idbanda = :idbanda and estado = 'ativo'");
    $stmt2->bindValue(":idbanda", $_GET["idbanda"]);
    $stmt2->execute();
    $resultado2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/1d33780d26.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/dashcss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Banda</title>
</head>
<body>
    <div id="header">
                <div id="logo">
                    <i class="fas fa-drum"></i>
                    <h3><span>Let's</span>Rock</h3>
                </div>
                <nav>
                    <i class="fas fa-home"></i>
                    <a href="../HTML/index.html">Home</a>
                    <i class="fas fa-briefcase"></i>
                    <a href="../HTML/index.html#container">Nosso trabalho</a>
                    <i class="fas fa-user-tie"></i>
                    <a href="../HTML/index.html#container">Sobre</a>
                </nav>
    </div>
    <div id="container">
            <div id="content-container">
                <h1> Gerenciar Banda</h1>
                <hr>
                <h1>Seus membros: </h1>
               
              <p>  <?php foreach($resultado2 as $value2){  ?> </p>
              <p>  <?php echo " ID musico = ".$value2["idmusico"]; ?> </p>
                    <?php 
                            $stmt3 = $conexao->prepare("select nome, email, estado, cidade from musico where idmusico = :idmusico");
                            $stmt3->bindValue(":idmusico", $value2["idmusico"]);
                            $stmt3->execute();
                            $resultado3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                    <p>  <?php foreach($resultado3 as $value3){  ?> </p>  
                    <p>  <?php echo " Nome do Musico = ".$value3["nome"]; ?> </p>
                    <p>  <?php echo " Email do Musico = ".$value3["email"]; ?> </p>   
                    <p>  <?php echo " Estado do Musico = ".$value3["estado"]; ?> </p> 
                    <p>  <?php echo " Cidade do Musico = ".$value3["cidade"]; ?> </p> 
                    <p>  <?php echo "<a  href='deleteMusicoConfirm.php?idmusico={$value2["idmusico"]}&idbanda={$_GET["idbanda"]}'> Deletar Musico </a> "; ?> </p>
                    <hr>
              <?php echo "<br/>"; }; ?> 
              <?php  }; ?>
            
            </div>
    </div>
    
    <div id="footer">
            <h4>Desenvolvido por Cauê Missfeld <i class="far fa-copyright"></i></h4> 
            <a href="../HTML/">Inicio</a>
    </div>

</body>
</html>