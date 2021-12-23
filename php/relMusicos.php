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
    <title>Relatório Músicos</title>
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

    $stmt = $conexao->prepare("select idmusico, nome, email, estado, cidade from musico");
    $stmt->execute();   
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultado as $value){
        echo " ID = ".$value["idmusico"];
        echo "<br/>";
        echo " Nome = ".$value["nome"];
        echo "<br/>";
        echo " Email = ".$value["email"];
        echo "<br/>";
        echo " Estado = ".$value["estado"];
        echo "<br/>";
        echo " Cidade = ".$value["cidade"];
        echo "<br/>";
        
        $stmt2 = $conexao->prepare("select idinstrumento from musico_instrumento where idmusico = :idmusico");
        $stmt2->bindValue(":idmusico", $value["idmusico"]);
        $stmt2->execute();   
        $resultado2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        foreach($resultado2 as $value2){
            
            $stmt3 = $conexao->prepare("select descIns from instrumento where idinstrumento = :idinstrumento");
            $stmt3->bindValue(":idinstrumento", $value2["idinstrumento"]);
            $stmt3->execute();   
            $resultado3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($resultado3 as $value3) {
                echo " Instrumento = ".$value3["descIns"];
                echo "<br/>";
            };
        };
        
        $stmt4 = $conexao->prepare("select idgenero from musico_genero where idmusico = :idmusico");
        $stmt4->bindValue(":idmusico", $value["idmusico"]);
        $stmt4->execute();   
        $resultado4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($resultado4 as $value4) {
                
                $stmt5 = $conexao->prepare("select descGen from genero where idgenero = :idgenero");
                $stmt5->bindValue(":idgenero", $value4["idgenero"]);
                $stmt5->execute();   
                $resultado5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);

                foreach ($resultado5 as $value5) {
                    echo " Genero = ".$value5["descGen"];
                    echo "<br/>";
                };
            };
        
        echo "<hr>";
    };
?>
</div>
</body>
</html>