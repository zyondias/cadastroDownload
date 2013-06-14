<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of classCurso
 *
 * @author Zyon
 */
class classCurso {

    //metodo para enviar curso para o e-mail do usuário
    public static function enviarCurso($email, $nome) {

        //criando mensagem do e-mail
        $mensagem = "Prezado(a) $nome <br /> Você esta recebendo o link para fazer o download do conteudo do curso do OSC <br /> http://osc.razaosocial.org.br/";
        //defenindo o tipo de texto e de quem ta sendo enviado o e-mail
        $headers = "Content-Type:text/html; charset=UTF-8\n";
        $headers .= "From:  suporte@institutorazaosocial.org.br";
        //enviando e-mail
        if (mail($email, "Conteudo curso OSC", $mensagem, $headers)) {
            //retornando verdadeiro para casso e-mail tenha sido enviado com sucesso
            return true;
        } else {
            //retornando falso para caso o e-mail nao tenha sido enviado.
            return false;
        }
    }

    public static function reenciarCurso($email) {
        include_once 'classUsuario.php';
        $usuario = new classUsuario();
        $dadosUser = $usuario->selectDadosusuario($email);
        if($dadosUser)
        {
            self::enviarCurso($email, $dadosUser[0]['nome']);
            echo 'O link com o conteudo do curso foi enviado novamente para seu e-mail';
        }
        else
            echo "Esse e-mail ainda não foi cadastrado <a href='index.php'>clique aqui</a> para fazer o cadastro ";
    }

}


if ((!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')) {
//verificando requisição veio com parametros e qual metodo - de pagina externa
    if (isset($_POST['metodo'])) {
        //pegando qual metodo foi solicitado
        $metodo = $_POST['metodo'];    
       
        //switch para chamar o metodo selcionado
         switch ($metodo)
          {
                case 'recuperacaoConteudo':{
                    classCurso::reenciarCurso($_POST['email']);
                }
          } 
    }
}
?>
