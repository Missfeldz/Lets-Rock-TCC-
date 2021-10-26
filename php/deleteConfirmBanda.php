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
        <h2>Você deseja deletar esta Banda?</h2>
            
        <form action="deleteBanda.php" method="POST">
            <div class="input-field">
                <i class="fas fa-check"></i>
                <input type="hidden" id="idbanda" name="idbanda" value="<?php echo $_POST["idbanda"];?>">
                <input type="submit" value="Deletar">
            <div class="underline"></div>
            </div>
        </form>
            <div class="input-field">
                <a href = "dashBanda.php"><i class="fas fa-times"></i> </a>
            <div class="underline"></div>
            </div>

        </div>
    </main>
</body>
</html>
