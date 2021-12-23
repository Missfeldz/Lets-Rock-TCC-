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
    <title>Listar Bandas</title>
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

        if(empty($_POST["cidadeBanda"]== false)){
            
            $stmt = $conexao->prepare("select idbanda, nomeBanda, idlider, estadoBanda, cidadeBanda from banda WHERE cidadeBanda = :cidadeBanda");
            $stmt->bindValue(":cidadeBanda", $_POST["cidadeBanda"]);
            $stmt->execute();   
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }else if(empty($_POST["idgenero"]== false)){
                
                $stmt = $conexao->prepare("select * from banda A inner join banda_genero B on A.idbanda = B.idbanda WHERE idgenero = :idgenero");
                $stmt->bindValue(":idgenero", $_POST["idgenero"]);
                $stmt->execute();   
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $stmt = $conexao->prepare("select idbanda, idlider, nomeBanda, estadoBanda, cidadeBanda from banda");
            $stmt->bindValue(":idbanda", $_POST["idgenero"]);
            $stmt->execute();   
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    ?>
    
 <form name="filtroLoc" action="listarBandas.php" method="POST"> 
            <h2> Filtro por Localização</h2>

            <div class="input-field">
                <i class="fas fa-flag-usa"></i>
                <select id="sltEstados" name="estadoBanda" class="js-example-basic-single" style="width: 250px;"  required></select>
            <div class="underline"></div>
            </div>

            <div class="input-field">
                <i class="fas fa-city"></i>
                <select id="sltCidades" name="cidadeBanda" class="js-example-basic-single" style="width: 250px;"  required></select>
            <div class="underline"></div>
            </div>
            <input type="submit" value="Filtar">
</form>
 
 <form name="filtroGen" action="listarBandas.php" method="POST"> 
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

 <form name="filtroIns" action="listarBandas.php" method="POST"> 
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
    //Listando valores já filtrados ou não//
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
        echo "<a title='Convidar' href='conviteBanda.php?idbanda={$value["idbanda"]}&idlider={$value["idlider"]}'> Inscrever-se </a>";
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