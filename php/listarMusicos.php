<?php
    //Check sessão//
    session_start();
    if( !isset($_SESSION["usuario"],$_SESSION["email"]) ) {
        header("location: ../HTML/");
    }
?>

<?php 
    //DB conexão//
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
    <title>Listar Músicos</title>
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
        //Querrys//
        $stmt2 = $conexao->prepare("select * from genero");
        $stmt2->execute();
        $resultado2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        $stmt3 = $conexao->prepare("select * from instrumento");
        $stmt3->execute();   
        $resultado3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

        //Check Filtros//
        if(isset($_GET["idbanda"])){
            
            $idbanda = $_GET["idbanda"];

            $stmt = $conexao->prepare("select idmusico, nome, email, estado, cidade from musico");
            $stmt->execute();   
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
        }else{
            
            $idbanda = $_POST["idbanda"];
           
            if(empty($_POST["cidade"] == false)){
            
            $stmt = $conexao->prepare("select idmusico, nome, email, estado, cidade from musico WHERE cidade = :cidade");
            $stmt->bindValue(":cidade", $_POST["cidade"]);
            $stmt->execute();   
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            }
            else if(empty($_POST["idgenero"] == false)){
                $stmt = $conexao->prepare("select * from musico A inner join musico_genero B on A.idmusico = B.idmusico WHERE idgenero = :idgenero");
                $stmt->bindValue(":idgenero", $_POST["idgenero"]);
                $stmt->execute();   
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            }else if(empty($_POST["idinstrumento"] == false)){
                $stmt = $conexao->prepare("select * from musico A inner join musico_instrumento B on A.idmusico = B.idmusico WHERE idinstrumento = :idinstrumento");
                $stmt->bindValue(":idinstrumento", $_POST["idinstrumento"]);
                $stmt->execute();   
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    ?>

 <form name="filtroLoc" action="listarMusicos.php" method="POST"> 
            <h2> Filtro por Localização</h2>

            <input type="hidden" name="idbanda" value="<?php echo $idbanda ?>" >

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
            <input type="submit" value="Filtar">
</form>
 
 <form name="filtroGen" action="listarMusicos.php" method="POST"> 
            <h2> Filtro por Genêro Musical</h2>

            <input type="hidden" name="idbanda" value="<?php echo $idbanda ?>" >

             <div class="input-field">
                <i class="fas fa-music"></i>
                <select id="idgenero" name="idgenero" class="js-example-basic-single" style="width: 250px;"  required>
                    <?php foreach ($resultado2 as $value2) { ?>
                            <option value="<?php echo $value2['idgenero'];?>"> <?php echo $value2['descGen'];?> </option>
                        <?php }; ?>
                </select>
            <div class="underline"></div>
            </div> 

            <input type="submit" value="Filtar">
</form>

 <form name="filtroIns" action="listarMusicos.php" method="POST"> 
            <h2> Filtro por Instrumento</h2>

            <input type="hidden" name="idbanda" value="<?php echo $idbanda ?>" >

            <div class="input-field">
                <i class="fas fa-guitar"></i>
                <select id="idinstrumento" name="idinstrumento" class="js-example-basic-single" style="width: 250px;" required>
                    <?php foreach ($resultado3 as $value3) { ?>
                        <option value="<?php echo $value3['idinstrumento'];?>"> <?php echo $value3['descIns'];?> </option>
                    <?php }; ?>
                </select>
            <div class="underline"></div>
            </div>
            <input type="submit" value="Filtar">
</form>
    
     <hr>
<?php 
    //Listando valores retirados já filtrados//
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

        $stmt4 = $conexao->prepare("select idinstrumento from musico_instrumento where :idmusico = idmusico");
        $stmt4->bindValue(":idmusico", $value["idmusico"]);
        $stmt4->execute();   
        $resultado4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($resultado4 as $value4) {
            $stmt5 = $conexao->prepare("select descIns from instrumento where :idinstrumento = idinstrumento");
            $stmt5->bindValue(":idinstrumento", $value4["idinstrumento"]);
            $stmt5->execute();
            $resultado5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
            
                foreach ($resultado5 as $value5){
                echo " Instrumento = ".$value5["descIns"];
                echo "<br/>";
            };  
        };

        $stmt6 = $conexao->prepare("select idgenero from musico_genero where :idmusico = idmusico");
        $stmt6->bindValue(":idmusico", $value["idmusico"]);
        $stmt6->execute();   
        $resultado6 = $stmt6->fetchAll(PDO::FETCH_ASSOC);
           
        foreach ($resultado6 as $value6){
           $stmt7 = $conexao->prepare("select descGen from genero where :idgenero = idgenero");
           $stmt7->bindValue(":idgenero", $value6["idgenero"]);
           $stmt7->execute();
           $resultado7 = $stmt7->fetchAll(PDO::FETCH_ASSOC);
               
               foreach ($resultado7 as $value7){
               echo " Gênero = ".$value7["descGen"];
               echo "<br/>";
        };

       };

        echo "<br/>";
        echo "<a title='Convidar' href='conviteMusico.php?idmusico={$value["idmusico"]}&idbanda={$idbanda}'> Convidar </a>";
        echo "<hr>";
    };
?>

</div>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src= "../Scripts/cadastroLoc.js"></script>
</html>