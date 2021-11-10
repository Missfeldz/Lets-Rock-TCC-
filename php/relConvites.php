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
    <title>Relatório Convites</title>
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
<h2> Inscrições Realizadas nas Bandas </h2>
<br>
<?php 

    $stmt = $conexao->prepare("select idmusico, idbanda, statusConvite from conviteBanda");
    $stmt->execute();   
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultado as $value){
        echo " ID musico = ".$value["idmusico"];
        echo "<br/>";
        echo " ID banda = ".$value["idbanda"];
        echo "<br/>";
        echo " Status do convite = ".$value["statusConvite"];
        echo "<br/>";
        echo "<br/>";
    };
?>
<br>
<hr>
<h2> Convites realizados por Bandas </h2>
<br/>
<?php 

    $stmt2 = $conexao->prepare("select musico_idmusico, banda_idbanda, statusConvite from convitemusico");
    $stmt2->execute();   
    $resultado2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultado2 as $value2){
        echo " ID = ".$value2["musico_idmusico"];
        echo "<br/>";
        echo " Nome = ".$value2["banda_idbanda"];
        echo "<br/>";
        echo " Nome = ".$value2["statusConvite"];
        echo "<br/>";
        echo "<br/>";
    };
?>
<br>

</div>
</body>
</html>