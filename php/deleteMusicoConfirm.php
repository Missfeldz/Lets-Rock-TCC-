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
    <script src="https://kit.fontawesome.com/1d33780d26.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/delConfirm.css">
    <title>Deletar</title>
</head>
<body>
    <main class="container">
        <h2>Você deseja deletar este Musico?</h2>
            
            <div class="input-field">
                <i class="fas fa-check"></i>
            <?php echo "<a  href='deleteMusico.php?idmusico={$_GET["idmusico"]}&idbanda={$_GET["idbanda"]}'> Deletar Musico </a> "; ?> </p>
            <div class="underline"></div>
            </div>

            <div class="input-field">
                <i class="fas fa-times"></i>
                <a href = "dashbord.php">Não </a>
            <div class="underline"></div>
            </div>

        </div>
    </main>
</body>
</html>
