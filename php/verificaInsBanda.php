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
?>

<?php
    $stmt = $conexao->prepare("select idmusico, idbanda from convitebanda WHERE idbanda = :idbanda and statusConvite = 'aberto'");
    $stmt->bindValue(":idbanda", $_GET["idbanda"]);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/1d33780d26.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/dashcss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrições Banda</title>
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
                    <a href="dashbord.php">Perfil</a>
                </nav>
    </div>
    <div id="container">
            <div id="content-container">
                <h1> Olá <i><b><?php echo $_SESSION["usuario"]?></i></b></h1>
                <hr>
                <h1>Encontramos as seguintes inscrições: </h1>
               
              <p>  <?php foreach($resultado as $value){  ?> </p>
              <p>  <?php echo " ID do musico = ".$value["idmusico"]; ?> </p>
             
              <?php
                    $stmt2 = $conexao->prepare("select nome, email, estado, cidade from musico WHERE idmusico = :idmusico");
                    $stmt2->bindValue(":idmusico", $value["idmusico"]);
                    $stmt2->execute();
                    $resultado2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
              ?>
              <p>  <?php foreach($resultado2 as $value2){  ?> </p>  
              <p>  <?php echo " Nome do musico = ".$value2["nome"]; ?> </p>
              <p>  <?php echo " Estado = ".$value2["estado"]; ?> </p>   
              <p>  <?php echo " Cidade = ".$value2["cidade"]; ?> </p> 
              <?php echo "<br/>"; }; ?> 
                <?php echo "<a title='aceitar' href='aceitarBanda.php?idmusico={$value["idmusico"]}&idbanda={$_GET["idbanda"]}'> Aceitar </a> "; ?> 
                <?php echo "<a title='recusar' href='recusarBanda.php?idmusico={$value["idmusico"]}&idbanda={$_GET["idbanda"]}'> Recusar </a> "; ?> 
              <hr>
              <?php echo "<br/>"; }; ?> 
            
               
                
            </div>
    </div>
    
   

</body>
</html>