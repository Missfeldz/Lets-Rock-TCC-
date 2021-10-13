<?php 
     date_default_timezone_set("America/Sao_Paulo");

     try{
         $conexao = new PDO("mysql: host=localhost; port=3306; dbname=letsbd","root","");
     }catch(PDOExeption $e){
         echo $e->getMessage();
     }
?>

<?php
    $stmt = $conexao->prepare("select * from instrumento");
    $stmt->execute();   
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt2 = $conexao->prepare("select * from genero");
    $stmt2->execute();
    $resultado2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/1d33780d26.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/cadastro.css">
    <script src="../Scripts/Validar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Cadastro Let's Rock</title>
</head>
<body>
    <main class="container">
        <h2><i class="fas fa-drum"></i> Cadastro Let's Rock</h2>
        <form name="formCadastro" action="../php/verificaC.php" method="POST">
            <div class="input-field">
                <i class="fas fa-signature"></i>
                <input type="text" name="nome" id="nome" placeholder="Insira seu nome" required>
            <div class="underline"></div>
            </div>

            <div class="input-field">
                <i class="fas fa-at"></i>
                <input type="text" name="email" id="email" placeholder="Insira seu e-mail" required>
            <div class="underline"></div>
            </div>

            <div class="input-field">
                <i class="fas fa-key"></i>
                <input type="password" name="password" id="password" placeholder="Insira sua senha" required>
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

            <div class="input-field">
                <i class="fas fa-guitar"></i>
                <select id="idinstrumento" name="idinstrumento" class="js-example-basic-single" style="width: 250px;" required>
                    <?php foreach ($resultado as $value) { ?>
                        <option value="<?php echo $value['idinstrumento'];?>"> <?php echo $value['descIns'];?> </option>
                    <?php }; ?>
                </select>
            <div class="underline"></div>
            </div>

            <div class="input-field">
                <i class="fas fa-music"></i>
                <select id="idgenero" name="idgenero" class="js-example-basic-single" style="width: 250px;"  required>
                    <?php foreach ($resultado2 as $value2) { ?>
                            <option value="<?php echo $value2['idgenero'];?>"> <?php echo $value2['descGen'];?> </option>
                        <?php }; ?>
                </select>
            <div class="underline"></div>
            </div>

            <input type="submit" onclick="return validarCadastro()">
        </form>

        <div class="footer">
            <spam> Ou vá para tela de Login</spam>
        <div class="social-field"></div>
            <div class="social-field google">
                <a href="../HTML/login.html">
                    <i class="fas fa-arrow-right"></i>
                    LogIn
                </a>
            </div>
        </div>    
    </main>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src= "../Scripts/cadastroLoc.js"></script>
</html>