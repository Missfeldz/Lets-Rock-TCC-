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
    $stmt = $conexao->prepare("select musico_idmusico, banda_idbanda from convitemusico WHERE musico_idmusico = :idmusico");
    $stmt->bindValue(":idmusico", $_SESSION["id"]);
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
    <title>Convites Recebidos</title>
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
                <h1>Encontramos os seguintes Convites: </h1>
               
              <p>  <?php foreach($resultado as $value){  ?> </p>
              <p>  <?php echo " ID da banda = ".$value["banda_idbanda"]; ?> </p>
             
              <?php
                    $stmt2 = $conexao->prepare("select nomeBanda, idlider, estadoBanda, cidadeBanda from banda WHERE idbanda = :idbanda");
                    $stmt2->bindValue(":idbanda", $value["banda_idbanda"]);
                    $stmt2->execute();
                    $resultado2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
              ?>
              <p>  <?php foreach($resultado2 as $value2){  ?> </p>  
              <p>  <?php echo " Nome da Banda = ".$value2["nomeBanda"]; ?> </p>
              <p>  <?php echo " Estado da Banda = ".$value2["estadoBanda"]; ?> </p>   
              <p>  <?php echo " Cidade da Banda = ".$value2["cidadeBanda"]; ?> </p> 
              <?php echo "<br/>"; }; ?> 
                <?php echo "<a title='aceitar' href='aceitarMusico.php?idbanda={$value["banda_idbanda"]}'> Aceitar </a> "; ?> 
                <?php echo "<a title='recusar' href='recusarMusico.php?idbanda={$value["banda_idbanda"]}'> Recusar </a> "; ?> 
              <hr>
              <?php echo "<br/>"; }; ?> 
            
                <h1> Suas Opções : </h1>
                
            </div>
    </div>
    
    <div id="footer">
            <h4>Desenvolvido por Cauê Missfeld <i class="far fa-copyright"></i></h4> 
            <a href="../HTML/">Inicio</a>
    </div>

</body>
</html>