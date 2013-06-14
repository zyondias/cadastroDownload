<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
        <title></title>
              <script type="text/javascript">
            //metodo para chamar function php para cadastra usuario
            $(document).ready(function() {
                    $("#formRecContCurso").submit(function(form) {
                             // Desabilita a função real do form, que seria mandar pra página 
                            form.preventDefault();
                            //pegando valores que estavam nos input text
                         var parEmail = $('#email').val();
                         //criando variavel com o nome do metodo que sera chamado no codigo php
                         var parMetodo = 'recuperacaoConteudo';
                         //requisitando class e passando parametros
                        $.post("class/classCurso.php", {email: parEmail, metodo: parMetodo },
                        //pegando o retorno da class de usuario
                        function(data){
                            if(data){
                              //colocando texto retornado no codigo php na div reposta
                             $("#resposta").html(data);
                            }
                         }
                         , "html");
                    });
                });
        </script>
    </head>
    <body>
        <h4>Recuperação de conteudo do curso</h4>
        <h5>Caso já tenha feito cadastro para  downloado do conteudo do curso e necessite do link novamente coloque seu e-mai abaixo: </h5>
        
        <form id="formRecContCurso" name="formRecContCurso" method="post" action="" >
              <input type="email" id="email" name="email" maxlength="50" placeholder="zyon.dias@hotmail.com" required>
            <input type="submit" value="Recuperar conteudo" /> 
        </form>
        <div id="resposta"></div>
        <?php
        // put your code here
        ?>
    </body>
</html>
