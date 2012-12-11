<?php
require_once 'php-form-controls-bootstrap.php'; /*
  $my_anchor = new pfcb_html_element("input");
  $my_anchor->set("type", "checkbox");
  $my_anchor->set("text", "checkbox");
  $my_anchor->set(array('href' => 'http://www.google.com.br', 'rel' => 'external'));
  $my_anchor->set("checked");

  $link = new pfcb_html_element("a");
  $my_anchor->set("href", "http://www.google.com.br");
  echo $link->get("href");
  //http://www.google.com.br

  $my_anchor->set("width", 100);
  echo ($my_anchor->output());
  $my_anchor->remove("width");
  echo ($my_anchor->output());
  $my_anchor->clearAllAttributes();
  echo ($my_anchor->output());
  $my_anchor->inject($link);


  $nullel = new pfcb_html_element("none");
  echo $nullel->output();

  $img = new pfcb_html_element('img');
  $img->set(array(
  'src' => 'http://www.w3schools.com/html/img_html5_html5.gif',
  'alt' => 'The HTML 5 Logo'
  ));
  $img->classAdd("imglink");
  $img->classAdd("imglink corner10");
  $img->classRemove("imglink");

  $link = new pfcb_html_element('a');
  $link->set('href', 'http://www.w3schools.com/html/html5_intro.asp');
  $link->inject($img);
  $link->output();
 * 


  $my_anchor = new pfcb_html_element("a");
  $my_anchor->set('href', 'http://www.google.com.br')
  ->set('rel', 'external')
  ->set('target', '_blank')
  ->set('text', 'Google.com')
  ->classAdd('link10')
  ->output(true); */
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
                $cnome = new pfcb_control_input_text("nome", "", "required", "Nome:");
                $cnome->setMethod("get");

                $cmail = new pfcb_control_input_text("mail", "", "required email", "Email:");
                $cmail->Append('</div>')
                        ->Prepend('<div class="input-prepend"><span class="add-on">@</span>')
                        ->setMethod("get");

                $csenha = new pfcb_control_input_text("senha", "", "", "Senha:");
                $csenha->setMethod("get");

                $cfone = pfcb_control_input_text::newControl("telefone", "", "fone", "Fone:");
                $cfone->setMethod("get");
                
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
