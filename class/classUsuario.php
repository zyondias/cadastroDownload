<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of classUsuario
 *
 * @author Zyon Dias
 */
class classUsuario {
   
    //metodo para cadastra usuario
    public function  cadastraUsuario($nome, $email, $estado, $municipio)
    {
        //abrindo conexao com banco
        include_once 'conexaoDB.php';
        $conn =  new PDO();
        $conn = conexaoDB::getConexao();
       //preparando a query para fazer o inserte
        $query = $conn->prepare("INSERT INTO usuarios (nome,email,estado,municipio) values (:pNome, :pEmail, :pEstado, :pMunicipio)");
        //passando os parametros para a query
        $query->bindValue(':pNome',$nome, PDO::PARAM_STR);
        $query->bindValue(':pEmail',$email, PDO::PARAM_STR);
        $query->bindValue(':pEstado' ,$estado, PDO::PARAM_STR);
        $query->bindValue(':pMunicipio',$municipio, PDO::PARAM_STR);
        //executando a query e verificando se ela foi executada no banco ou nao
        if($query->execute())
        {
            //se executada retorna verdadeiro
            return true;
        }
        else
            return false;
        }
        
        //metodo para verificar se e-mail já existe
        public function emailExistente($email)
        {
             //abrindo conexao com banco
            include_once 'conexaoDB.php';
            $conn =  new PDO();
            $conn = conexaoDB::getConexao();
            //preparando a query para fazer select do e-mail
            $query = $conn->prepare("SELECT email FROM usuarios WHERE email = :pEmail");       
            //´passando parametros para query
            $query->bindValue(':pEmail', $email, PDO::PARAM_STR);
            //executando a query
           $query->execute();
           
           //verificando se a query retornou mais de 0 linhas
           if($query->rowCount() >0){
                return true;
        }
            else
                 return false;
        }
}

//verificando requisição veio com parametros e qual metodo - de pagina externa
if (isset($_POST['metodo']) ) {
    //pegando qual metodo foi solicitado
    $metodo = $_POST['metodo'];    
    //switch para chamar o metodo selcionado
    switch ($metodo)
    {
        //caso seja metodo para cadastra usuário
        case 'CadastraUsuario':{
            //extraindo os parametros enviados 
            extract($_POST);
            //instanciando a calsse de usuario
             $usuario = new classUsuario;
             //verificando se o e-mail já esta cadastrado
             if($usuario->emailExistente($email))
             {
                 echo 'E-mail existente';
                 exit();
             }
             //cadastrando e verificando se foi cadastrado com sucesso
             if($usuario->cadastraUsuario($nome, $email, $estado, $municipio))
             {
                 echo 'Cadastro Efetuado com Sucesso!';
                 exit();
             }
              else
                  echo 'Erro Ao cadastra';
        }
    }  
}
?>
