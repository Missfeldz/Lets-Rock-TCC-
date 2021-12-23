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
    $stmt = $conexao->prepare("select idbanda from musico_banda where idmusico = :idmusico and estado = 'ativo'");
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
    <title>Bandas</title>
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
                <h1> Olá <i><b><?php echo $_SESSION["usuario"]?></i></b></h1>
                <hr>
                <h1>As bandas que você participa são: </h1>
               
              <p>  <?php foreach($resultado as $value){  ?> </p>
              <p>  <?php echo " ID Banda = ".$value["idbanda"]; ?> </p>
                <?php  
                    $stmt2 = $conexao->prepare("select nomeBanda, idlider, estadoBanda, cidadeBanda from banda where idbanda = :idbanda");
                    $stmt2->bindValue(":idbanda", $value["idbanda"]);
                    $stmt2->execute();
                    $resultado2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                ?>
              <p>  <?php foreach($resultado2 as $value2){ ?> </p>
              <p>  <?php echo " Nome Banda = ".$value2["nomeBanda"]; ?> </p>
              <p>  <?php echo " ID Lider = ".$value2["idlider"]; ?> </p>
              <p>  <?php echo " Estado = ".$value2["estadoBanda"]; ?> </p>
              <p>  <?php echo " Cidade  = ".$value2["cidadeBanda"]; ?> </p>
              <p>  <?php echo "<a  href='sairBandaMusicoConfirm.php?idbanda={$value["idbanda"]}&idmusico={$_SESSION["id"]}'> Sair da Banda </a> "; ?> </p>
              <hr>
              <?php  
                    $stmt3 = $conexao->prepare("select idmusico from musico_banda where idbanda = :idbanda and estado = 'ativo'");
                    $stmt3->bindValue(":idbanda", $value["idbanda"]);
                    $stmt3->execute();
                    $resultado3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
                ?>
              <p>  <?php foreach($resultado3 as $value3){ ?> </p>
              <p>  <?php echo " Id do Membro = ".$value3["idmusico"]; ?> </p>
                <?php  
                        $stmt4 = $conexao->prepare("select nome, email, estado, cidade from musico where idmusico= :idmusicobanda");
                        $stmt4->bindValue(":idmusicobanda", $value3["idmusico"]);
                        $stmt4->execute();
                        $resultado4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
                    ?>
              <p>  <?php foreach($resultado4 as $value4){ ?> </p>
              <p>  <?php echo " Nome do Membro = ".$value4["nome"]; ?> </p>
              <p>  <?php echo " ID Lider = ".$value4["email"]; ?> </p>
              <p>  <?php echo " Estado = ".$value4["estado"]; ?> </p>
              <p>  <?php echo " Cidade  = ".$value4["cidade"]; ?> </p>
              <br>  
              <hr>

              <?php }; ?> 
              <?php }; ?> 
              <?php }; ?> 
              <?php }; ?> 
                
            </div>
    </div>
    
    <div id="footer">
            <h4>Desenvolvido por Cauê Missfeld <i class="far fa-copyright"></i></h4> 
            <a href="../HTML/">Inicio</a>
    </div>

</body>
</html>