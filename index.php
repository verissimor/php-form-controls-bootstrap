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

        <script>
            $(document).ready(function(){
                $("#cadastro").validate();
            });
        </script>
    </head>
    <body>
        <h1>Hello, world!</h1>

        <form id="cadastro">
            <fieldset>
                <?php
                $control = new pfcb_control_input_text("naonao", "");
                echo $control->getHtmlControl();
                ?>

                <input type="submit" value="Enviar" />
            </fieldset>
        </form>

    </body>
</html>
