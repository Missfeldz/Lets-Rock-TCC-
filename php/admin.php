<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/1d33780d26.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Scripts/Alerts.js"></script>
    <title>Admin Controle</title>
</head>
<body>
    <main class="container">
        <h2>Cadastre Instrumento</h2>
        <form name="instrumento" action="inserirInstrumento.php" method="POST">
            <label for="instrumento">Insira o Instrumento: </label>
            <input type="text" name="instrumento">
            <input type="submit" value="cadastrar" onclick="return alertAdmin()">
        </form> 

        <br>

        <h2>Cadastre Genero</h2>
        <form name="genero" action="inserirGenero.php" method="POST">
            <label for="genero">Insira o Genero: </label>
            <input type="text" name="genero">
            <input type="submit" value="cadastrar" onclick="return alertAdmin()">
        </form>

    </main>
</body>

</html>