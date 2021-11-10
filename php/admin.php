<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/1d33780d26.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/dashcss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
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
                <h1> ADMIN CONTROLE </h1>                
                <hr> 

                   <h2>Cadastrar Instrumento</h2>
                   <form name="instrumento" action="inserirInstrumento.php" method="POST">
                        <input type="text" name="instrumento">
                        <input type="submit" value="cadastrar" onclick="return alertAdmin()">
                    </form> 
                    
                    <h2>Cadastrar Genero</h2>
                    <form name="genero" action="inserirGenero.php" method="POST">
                        <input type="text" name="genero">
                        <input type="submit" value="cadastrar" onclick="return alertAdmin()">
                    </form>
                <br>
                <hr>
                <h1>Relatorios</h1>
                <a href="relMusicos.php"> Relatorio de Musico<a>
                <br>
                <a href="relBandas.php"> Relatorio de Banda<a>
                <br>
                <a href="relInsGen.php"> Relatorio de Instrumentos e Generos<a>
                <br>
                <a href="relConvites.php"> Relatorio de convites<a>
            </div>
    </div>
    
    <div id="footer">
            <h4>Desenvolvido por Cauê Missfeld <i class="far fa-copyright"></i></h4> 
            <a href="../HTML/">Inicio</a>
    </div>

</body>
</html>