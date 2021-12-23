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
    <title>Relatório Bandas</title>
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

<?php 

    $stmt = $conexao->prepare("select idbanda, idlider, nomeBanda, estadoBanda, cidadeBanda from banda");
    $stmt->execute();   
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultado as $value){
        echo " ID = ".$value["idbanda"];
        echo "<br/>";
        echo " ID Lider = ".$value["idlider"];
        echo "<br/>";
        echo " Nome = ".$value["nomeBanda"];
        echo "<br/>";
        echo " Estado = ".$value["estadoBanda"];
        echo "<br/>";
        echo " Cidade = ".$value["cidadeBanda"];
        echo "<br/>";
        
        $stmt2 = $conexao->prepare("select idgenero from banda_genero where idbanda = :idbanda");
        $stmt2->bindValue(":idbanda", $value["idbanda"]);
        $stmt2->execute();   
        $resultado2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultado2 as $value2) {
            
            $stmt3 = $conexao->prepare("select descGen from genero where idgenero = :idgenero");
            $stmt3->bindValue(":idgenero", $value2["idgenero"]);
            $stmt3->execute();   
            $resultado3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($resultado3 as $value3){
            echo " Genero = ".$value3["descGen"];
            echo "<br/>";
            };
        };

        echo "<hr>";
    };
?>

</div>
</body>
</html>