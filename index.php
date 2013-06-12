<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/css.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/cidades-estados-v2.js"></script>
         <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
        
        <script type="text/javascript">
            //metodo para  preencher dropdownlist
            window.onload = function() {
                new dgCidadesEstados(
                        document.getElementById('estado'),
                        document.getElementById('mun'),
                        true
                        );
            };
            
            //metodo para chamar function php para cadastra usuario
            $(document).ready(function() {
                    $("#formEscola").submit(function(form) {
                             // Desabilita a função real do form, que seria mandar pra página 
                            form.preventDefault();
                            //pegando valores que estavam nos input text
                         var parNome = $('#nome').val();
                         var parEmail = $('#email').val();
                         var parEstado = $('#estado').val();
                         var parMun = $('#mun').val();
                         //criando variavel com o nome do metodo que sera chamado no codigo php
                         var parMetodo = 'CadastraUsuario';
                         //requisitando class e passando parametros
                        $.post("class/classUsuario.php", {nome: parNome, email: parEmail, estado: parEstado, municipio: parMun,metodo: parMetodo },
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
        
        <title></title>
    </head>
    <body>
        <?php
         include_once 'class/classCurso.php';
        // classCurso::enviarCurso();
        ?>
        <form id="formEscola" name="formEscola" method="post" action="" >
            <label>Nome:</label>
            <input type="text" id="nome" name="nome" maxlength="80" placeholder="Zyon Dias" required>

            <label>E-mail: </label>
            <input type="email" id="email" name="email" maxlength="50" placeholder="zyon.dias@hotmail.com" required>

            <label>Estado:</label>
            <select name="estado" id="estado" required>
            </select>
            <br />
            <label>Municipio:</label>
            <select name="mun" id="mun" required="">
            </select>

            <input type="submit" value="Gravar" /> 
        </form>    
        <div id="resposta"></div>
    </body>
</html>
