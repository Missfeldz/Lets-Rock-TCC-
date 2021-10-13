<?php
class Conexao{
    private static $conexao;

    static function getConexao(){
        if( !isset(self::$conexao)){
            date_default_timezone_set("America/Sao_Paulo");
            try{
                self::$conexao = new PDO("mysql: host=localhost; port=3306; dbname=letsbd","root","");
            }catch(PDOExeption $e){
                echo $e->getMessage();
            }
        }
        return self::$conexao;
    }
}
?>