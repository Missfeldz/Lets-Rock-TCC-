<?php
    //Check sessão//
    session_start();
    if( !isset($_SESSION["usuario"],$_SESSION["email"]) ) {
        header("location: ../HTML/");
    }
    
?>

<?php 
    //DB conexão//
     date_default_timezone_set("America/Sao_Paulo");

     try{
         $conexao = new PDO("mysql: host=localhost; port=3306; dbname=letsbd","root","");
     }catch(PDOExeption $e){
         echo $e->getMessage();
     }
?>

<?php
    //Querry receber valores das bandas do usuário//
    $stmt = $conexao->prepare("select idbanda, nomeBanda, estadoBanda cidadeBanda from banda where idlider = :idlider");
    $stmt->bindValue(":idlider", $_SESSION["id"]);
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
    <title>Perfil Banda</title>
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
                <h1>Suas bandas são: </h1>
               
              <p>  <?php foreach($resultado as $value){  ?> </p>
              <p>  <?php echo " Nome = ".$value["nomeBanda"]; ?> </p>
              <p>  <?php echo " ID = ".$value["idbanda"]; ?> </p>
              <p>  <?php echo "<a  href='verificaInsBanda.php?idbanda={$value["idbanda"]}'> Verificar Inscrições </a> "; ?> </p>
              <p>  <?php echo "<a  href='listarMusicos.php?idbanda={$value["idbanda"]}'> Encontrar Musicos </a> "; ?> </p>
              <p>  <?php echo "<a  href='cadastrarGenBanda.php?idbanda={$value["idbanda"]}'> Cadastrar Gênero Musical da Banda </a> "; ?> </p>
              <p>  <?php echo "<a  href='gerenciarBanda.php?idbanda={$value["idbanda"]}'> Gerenciar Banda </a> "; ?> </p>
              <hr>
              <?php echo "<br/>"; }; ?> 
            
                <h1> Suas Opções : </h1>
                <a href ="selectBandaalt.php"> Alterar dados </a>
                <br>
                <a href ="selectBandadel.php"> Deletar bandas </a>
            </div>
    </div>
    
    
</body>
</html>