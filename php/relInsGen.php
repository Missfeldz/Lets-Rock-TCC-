<?php 
     date_default_timezone_set("America/Sao_Paulo");

     try{
         $conexao = new PDO("mysql: host=localhost; port=3306; dbname=letsbd","root","");
     }catch(PDOExeption $e){
         echo $e->getMessage();
     }
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1d33780d26.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/listar.css">
    <title>Relatório Genero e Instrumentos Cadastrados </title>
</head>
<body>

<div id="header">
            <div id="logo">
                <i class="fas fa-drum"></i>
                <h3><span>Let's</span>Rock</h3>
            </div>
            <nav>
                <i class="fas fa-home"></i>
                <a href="../HTML/">Home</a>
                <i class="fas fa-briefcase"></i>
                <a href="../HTML/index.html#container">Nosso trabalho</a>
                <i class="fas fa-user-tie"></i>
                <a href="../HTML/index.html#container   ">Sobre</a>
                <i class="fas fa-user-circle"></i>
                <a href="dashbord.php"> Perfil </a>
            </nav>
 </div>

 <div id="container">
<h2> Genêros Cadastrados </h2>
<?php 

    $stmt = $conexao->prepare("select idgenero, descGen from genero");
    $stmt->execute();   
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultado as $value){
        echo " ID = ".$value["idgenero"];
        echo "<br/>";
        echo " Nome = ".$value["descGen"];
        echo "<br/>";
    };
?>
<br>
<hr>
<h2> Instrumentos Cadastrados </h2>
<?php 

    $stmt2 = $conexao->prepare("select idinstrumento, descIns from instrumento");
    $stmt2->execute();   
    $resultado2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultado2 as $value2){
        echo " ID = ".$value2["idinstrumento"];
        echo "<br/>";
        echo " Nome = ".$value2["descIns"];
        echo "<br/>";
    };
?>
<br>

</div>
</body>
</html>