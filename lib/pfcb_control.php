<?php

/**
 * @property pfcb_html_element $control
 */
class pfcb_control {

    private $value;
    private $name;
    private $method = "post";
    private $jsFiles = array();
    private $jsOnReady = "";
    private $cssFiles = array();
    private $cssStyle = "";
    protected $control;
    public $validator;

    protected function getType() {
        return "pfcb_control";
    }

    protected function setup() {
        return false;
    }

    public static function newControl($name, $value = "", $pfcbValidator = "") {
        $control = new pfcb_control($name, $value, $pfcbValidator);
        return $control;
    }

    function __construct($name, $value = "", $pfcbValidator = "") {
        $this->name = $name;

        $control = new pfcb_html_element($this->getType());
        $control->set("name", $name);
        $control->set("id", $name);
        $this->control = $control;

        $this->value = $value;

        $this->validator = $pfcbValidator;
        $this->setup();
    }

    public function getValue() {
        if ($this->method == "post" && pfcb::isPostBack() && isset($_POST[$this->name])) {
            return $_POST[$this->name];
        }

        if ($this->method == "get" && isset($_GET[$this->name])) {
            return $_GET[$this->name];
        }

        return $this->value;
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
        $this->control->set("value", $this->getValue());
        $this->control->classAdd($this->validator);
        return $this->control->output();
    }

    public function __toString() {
        return $this->getHtmlControl();
    }

    public function setMethod($method) {
        $this->method = $method;
        return $this;
    }

}