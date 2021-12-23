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
           
            $stmt2 = $conexao->prepare("select * from musico where idmusico = :idmusico");
            $stmt2->bindValue(":idmusico", $value["idmusico"]);
            $stmt2->execute();
            $resultado2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($resultado2 as $value2){
             echo "<br/>";
             echo "Nome do Musico que se inscreveu = ".$value2["nome"];   
             echo "<br/>";
             echo "E-Mail do Musico que se inscreveu = ".$value2["email"]; 
             echo "<br/>";  
            };

        echo "<br/>";
        echo " ID banda = ".$value["idbanda"];

            $stmt3 = $conexao->prepare("select * from banda where idbanda = :idbanda");
            $stmt3->bindValue(":idbanda", $value["idbanda"]);
            $stmt3->execute();
            $resultado3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

            foreach($resultado3 as $value3){
                echo "<br/>";
                echo "Nome da Banda = ".$value3["nomeBanda"];   
                echo "<br/>";  
               };
        echo "<br/>";
        echo " Status do convite = ".$value["statusConvite"];
        echo "<hr>";
        echo "<br/>";
    };
?>
<br/>
<h2> Convites realizados por Bandas </h2>
<br/>
<?php 

    $stmt4 = $conexao->prepare("select musico_idmusico, banda_idbanda, statusConvite from convitemusico");
    $stmt4->execute();   
    $resultado4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultado4 as $value4){
        echo " ID = ".$value4["musico_idmusico"];
           
            $stmt5 = $conexao->prepare("select * from musico where idmusico = :idmusico");
            $stmt5->bindValue(":idmusico", $value4["musico_idmusico"]);
            $stmt5->execute();
            $resultado5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($resultado5 as $value5){
            echo "<br/>";
            echo "Nome do Musico  = ".$value5["nome"];   
            echo "<br/>";
            echo "E-Mail do Musico  = ".$value5["email"]; 
            echo "<br/>";  
            };
        
        echo "<br/>";
        echo " Id da Banda = ".$value4["banda_idbanda"];

            $stmt6 = $conexao->prepare("select * from banda where idbanda = :idbanda");
            $stmt6->bindValue(":idbanda", $value4["banda_idbanda"]);
            $stmt6->execute();
            $resultado6 = $stmt6->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($resultado6 as $value6){
            echo "<br/>";
            echo "Nome da Banda = ".$value6["nomeBanda"];   
            echo "<br/>";
            };

        echo "<br/>";
        echo " Status do Convite = ".$value4["statusConvite"];
        echo "<hr/>";
        echo "<br/>";
    };
?>
<br>

</div>
</body>
</html>