<?php
require_once 'phpform.php'; 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bootstrap 101 Template</title>
        <!-- Bootstrap -->
        <link href="/js-css/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="/js-css/jquery.validate/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/js-css/jquery.validate/localization/messages_pt_BR.js" type="text/javascript"></script>
        <script src="/js-css/bootstrap/js/bootstrap.min.js"></script>

        <style>
            label.valid {
                width: 24px;
                height: 24px;
                background: url(http://alittlecode.com/files/jQuery-Validate-Demo/assets/img/valid.png) center center no-repeat;
                display: inline-block;
                text-indent: -9999px;
            }
            label.error {
                font-weight: bold;
                color: #B94A48;
                padding: 0px 8px;
            }
        </style>

        <script>
            $(document).ready(function(){
                $("#cadastro").validate({
                    highlight: function(label) {
                        $(label).removeClass('valid').closest('.control-group').addClass('error').removeClass('success');
                    },
                    success: function(label) {
                        label.text('OK!').addClass('valid');
                        label.closest('.control-group').addClass('success').removeClass('error');
                    }
                });
            });
        </script>
    </head>
    <body>
        <h1>Hello, world!</h1>

        <form id="cadastro" method="get" class="form-horizontal">
            <fieldset>
                <?php
                $cnome = new phpform_control_input_text("nome", "", "required");
                $cnome->setMethod("get");
                $cnome->setLabel("Nome");

                $cmail = new phpform_control_input_text("mail", "", "required email");
                $cmail->Append('</div>')
                        ->setLabel("Email")
                        ->Prepend('<div class="input-prepend"><span class="add-on">@</span>')
                        ->setMethod("get");

                $csenha = new phpform_control_input_text("senha", "", "");
                $csenha->setMethod("get");
                $csenha->setLabel("Senha");

                $cfone = phpform_control_input_text::newControl("telefone", "", "fone");
                $cfone->setMethod("get");
                $cfone->setLabel("Fone");



                echo $cnome . $cmail . $csenha . $cfone;
                ?>

                <input type="submit" value="Enviar" />
            </fieldset>
        </form>

        <?php
        echo "Nome: " . $cnome->getValue() . "<br />";
        echo "Email: " . $cmail->getValue() . "<br />";
        echo "Email Validator: " . $cmail->validator . "<br />";
        echo "Senha: " . $csenha->getValue() . "<br />";
        echo "Fone: " . $cfone->getValue() . "<br />";
        ?>

    </body>
</html>
