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
    $stmt = $conexao->prepare("select nomeBanda, estadoBanda, cidadeBanda from banda WHERE idbanda = :idbanda");
    $stmt->bindValue(":idbanda", $_POST["idbanda"]);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/1d33780d26.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/cadastro.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Dados Banda</title>
</head>
<body>
    <main class="container">
        <h2><i class="fas fa-drum"></i> Altere seus dados: </h2>
        <form name="formCadastro" action="alterarBanda.php" method="POST">
            
        <input type="hidden" id="idbanda" name="idbanda" value="<?php echo $_POST["idbanda"]; ?>">
            
            <div class="input-field">
                <i class="fas fa-signature"></i>
                <label for="text"> Nome: </label>
                <input type ="text" name ="nomeBanda" id = "nomeBanda" value = "<?php foreach ($resultado as $value) {
                 echo $value["nomeBanda"];
                                      }?>">
            <div class="underline"></div>
            </div>

            <div class="input-field">
                <i class="fas fa-flag-usa"></i>
                <label for="text"> Estado: </label>
                <select id="sltEstados" name="estado" class="js-example-basic-single" style="width: 250px;" value="<?php echo $resultado["nomeBanda"]; ?>" required></select>
            <div class="underline"></div>
            </div>
            
            <div class="input-field">
                <i class="fas fa-city"></i>
                <label for="text"> Cidade: </label>
                <select id="sltCidades" name="cidade" class="js-example-basic-single" style="width: 200px;" value="<?php echo $resultado["nomeBanda"]; ?>" required></select>
            <div class="underline"></div>
            </div>

            <input type="submit" value="Alterar Dados Banda">
        </form>

        <div class="footer">
            <spam> Ou volte para o seu perfil</spam>
        <div class="social-field"></div>
            <div class="social-field google">
                <a href="dashbord.php">
                    <i class="fas fa-arrow-right"></i>
                    Perfil
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