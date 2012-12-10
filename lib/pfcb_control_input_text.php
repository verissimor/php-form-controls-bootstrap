<?php

/**
 * @property pfcb_html_element $label
 * @property pfcb_html_element $span
 */
class pfcb_control_input_text extends pfcb_control {

    protected $label;
    protected $span;

    protected function getType() {
        return "input";
    }

    protected function setup() {
        $this->control->set("type", "text");
        $this->control->classAdd("required");
    }

    public function getLabel() {
        return $this->label;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function getSpan() {
        return $this->span;
    }

    public function setSpan($span) {
        $this->span = $span;
    }

    public function getHtmlControl() {
        $control = parent::getHtmlControl();

        $this->label->inject($control);
        $this->label->inject($this->span);
        return $this->label->output();
    }

    public function __construct($name, $value = "", $label = "") {
        $this->label = new pfcb_html_element("label");
        $this->span = new pfcb_html_element("span");



        parent::__construct($name, $value);
    }

}

