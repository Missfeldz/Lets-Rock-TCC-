<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/1d33780d26.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/dashcss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Admin</title>
</head>
<body>
    <div id="header">
                <div id="logo">
                    <i class="fas fa-drum"></i>
                    <h3><span>Let's</span>Rock</h3>
                </div>
                <nav>
                    <i class="fas fa-home"></i>
                    <a href="../HTML/index.html">Home</a>
                    <i class="fas fa-briefcase"></i>
                    <a href="../HTML/index.html#container">Nosso trabalho</a>
                    <i class="fas fa-user-tie"></i>
                    <a href="../HTML/index.html#container">Sobre</a>
                </nav>
    </div>
    <div id="container">
            <div id="content-container">
                <h1> Controle Administrador </h1>                
                <hr> 

                   <h2>Cadastrar Instrumento</h2>
                   <form name="instrumento" action="inserirInstrumento.php" method="POST">
                        <input type="text" name="instrumento">
                        <input type="submit" value="cadastrar" onclick="return alertAdmin()">
                    </form> 
                    
                    <h2>Cadastrar Gênero</h2>
                    <form name="genero" action="inserirGenero.php" method="POST">
                        <input type="text" name="genero">
                        <input type="submit" value="cadastrar" onclick="return alertAdmin()">
                    </form>
                <br>
                
                <hr>
                <br>

                <h1>Relatórios</h1>
                <a href="relMusicos.php"> Relatório de Músicos<a>
                <br>
                <a href="relBandas.php"> Relatório de Bandas<a>
                <br>
                <a href="relInsGen.php"> Relatório de Instrumentos e Gêneros<a>
                <br>
                <a href="relConvites.php"> Relatório de Convites<a>
                <br>
                <br>
                <br>
                
                
            </div>
    </div>
   

</body>
</html>