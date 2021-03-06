<?php 
     date_default_timezone_set("America/Sao_Paulo");

     try{
         $conexao = new PDO("mysql: host=localhost; port=3306; dbname=letsbd","root","");
     }catch(PDOExeption $e){
         echo $e->getMessage();
     }
?>

<?php
    session_start();
    if( !isset($_SESSION["usuario"],$_SESSION["email"]) ) {
        header("location: ../HTML/");
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1d33780d26.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/cadastroBanda.css">
    <title>Cadastro Banda</title>
</head>
<body>
    <main class="container">
        <h2><i class="fas fa-drum"></i> Cadastro Banda Let's Rock</h2>
        <form action="../php/verificaB.php" method="POST">

            <div class="input-field">
                <i class="fas fa-signature"></i>
                <input type="text" name="nomeBanda" id="nomeBanda" placeholder="Insira o nome da Banda" required>
            <div class="underline"></div>
            </div>

            <div class="input-field">
                <i class="fas fa-flag-usa"></i>
                <select id="sltEstados" name="estado" class="js-example-basic-single" style="width: 250px;"  required></select>
            <div class="underline"></div>
            </div>

            <div class="input-field">
                <i class="fas fa-city"></i>
                <select id="sltCidades" name="cidade" class="js-example-basic-single" style="width: 250px;"  required></select>
            <div class="underline"></div>
            </div>

            <input type="submit" value="Continuar" onclick="return alertBanda()">
        </form>

        <div class="footer">
            <spam> Ou volte para o seu perfil</spam>
        <div class="social-field"></div>
            <div class="social-field google">
                <a href="dashbord.php">
                    <i class="fas fa-arrow-right"></i>
                    Voltar  
                </a>
            </div>
        </div>    
    </main>
    
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src= "../Scripts/cadastroLoc.js"></script>
    <script src= "../Scripts/Alerts.js"></script>
</html>