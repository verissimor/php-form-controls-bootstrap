<?php

/**
 * @property pfcb_html_element $control
 */
abstract class pfcb_control {

    protected $control;
    private $value;
    private $name;
    private $jsFiles = array();
    private $jsOnReady = "";
    private $cssFiles = array();
    private $cssStyle = "";

    abstract protected function getType();

    abstract protected function setup();

    function __construct($name, $value = "") {
        $this->name = $name;

        $control = new pfcb_html_element($this->getType());
        $control->set("name", $name);
        $control->set("id", $name);
        $this->control = $control;

        $this->value = $value;

        $this->setup();
    }

    protected function getValue() {
        if (pfcb::isPostBack() && isset($_POST[$this->name])) {
            return $_POST[$this->name];
        } else {
            return $this->value;
        }
    }

    protected function jsFileAdd($jsFileName) {
        $this->jsFiles[] = $jsFileName;
    }

    protected function jsOnReadyAdd($jsOnReady) {
        $this->jsOnReady .= $jsOnReady;
    }

    protected function cssFilesAdd($cssFiles) {
        $this->cssFiles[] = $cssFiles;
    }

    protected function cssStyle($cssStyle) {
        $this->cssStyle .= $cssStyle;
    }

    public function getHtmlControl() {
        $this->control->set("value", $this->value);
        return $this->control->output();
    }

}