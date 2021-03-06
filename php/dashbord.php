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

<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/1d33780d26.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/dashcss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
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
                <!-- Listando valores da sessão--> 
                <h1> Bem vindo ao seu perfil <i><b><?php echo $_SESSION["usuario"]?></i></b></h1>
                <h1>Suas Informações: </h1>
                
                <hr> 

                <p><i class="fas fa-signature"></i> Seu nome = <?php echo $_SESSION["usuario"]?> </p> 
                <p><i class="fas fa-at"></i> Seu email = <?php echo $_SESSION["email"]?></p> 
                <p><i class="fas fa-key"></i> Sua senha = <?php echo $_SESSION["senha"]?></p>
                <p><i class="fas fa-id-card"></i> Seu ID = <?php echo $_SESSION["id"]?></p>  

                <hr>
                <h1> Suas Opções : </h1>
                <br>
                <a href="cadastrarInsGen.php"> Cadastrar Instrumento e Gênero </a>
                <br>
                <a href="alterar.php"> Alterar Dados </a>
                <br>
                <a href="deleteConfirm.php"> Deletar Conta </a>
                <br>
                <a href="cadastroBanda.php"> Cadastrar Banda </a>
                <br>
                <a href="dashBanda.php"> Ver suas Bandas </a>
                <br>
                <a href="musicoBanda.php"> Ver bandas que você integra </a>
                <br>
                <a href="verificarInsMusico.php"> Ver seus convites </a>
                <br>
                <a href="listarBandas.php"> Encontrar Bandas</a>
                <br>
                <br>
                <br>
            </div>
    </div>
    
    

</body>
</html>