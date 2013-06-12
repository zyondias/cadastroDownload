<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of classCurso
 *
 * @author Fernando
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

}

?>
