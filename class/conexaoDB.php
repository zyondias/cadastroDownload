<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexaoDB
 *
 * @author Zyon Dias
 */
class conexaoDB  {    
    //propriedade estatica de conexao
    static private  $conn;  
    
    //metodo para retornando conexao com banco
    public static function  getConexao()
    {
       
        //verificando se já existe conexao
        if(! isset(self::$conn))
        {
                try{
                    //criando conexao
                    //essaopção é para que seja possivel fazer conexão com banco a parti de solicitadao javascritp
                     $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
                     self::$conn = new PDO('mysql:unix_socket=/tmp/mysql.sock;host=localhost;port=3306;dbname=cadastro_download', 'root', '', $opcoes);
               }
               catch (PDOException $e)
               {
                     echo ' Erro ao conectar ao banco';
                    
               }
        }
        //retornando conexao
        return self::$conn;
      
    }
 }

?>
