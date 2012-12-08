<?php

require_once 'html.php'; /*
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
 */

$my_anchor = new pfcb_html_element("a");
$my_anchor->set('href', 'http://www.google.com.br')
        ->set('rel', 'external')
        ->set('target', '_blank')
        ->set('text', 'Google.com')
        ->classAdd('link10')
        ->output(true);