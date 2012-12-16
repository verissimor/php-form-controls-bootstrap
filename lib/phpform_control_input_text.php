<?php

/**
 * @property phpform_html_element $label
 * @property phpform_html_element $divControl_group
 * @property phpform_html_element $divControls
 */
class phpform_control_input_text extends phpform_control {

    public $label;
    public $divControl_group;
    public $divControls;
    protected $append = "";
    protected $prepend = "";

    protected function getType() {
        return "input";
    }

    protected function setup() {
        $this->control->set("type", "text");
        return $this;
    }

    public function newControl($name, $value = "", $pfcbValidator = "") {
        return new phpform_control_input_text($name, $value, $pfcbValidator);
    }

    public function Append($append) {
        $this->append .= $append;
        return $this;
    }

    public function Prepend($prepend) {
        $this->prepend .= $prepend;
        return $this;
    }

    public function getHtmlControl() {
        $control = $this->prepend . parent::getHtmlControl() . $this->append;

        $this->divControls->inject($control);
        $this->divControl_group->inject($this->label);
        $this->divControl_group->inject($this->divControls);

        return $this->divControl_group->output();
    }

    public function __construct($name, $value = "", $pfcbValidator = "") {
        parent::__construct($name, $value, $pfcbValidator);


        $this->label = new phpform_html_element("label");
        $this->label->classAdd("control-label");
        $this->label->set("for", $name);

        $this->divControl_group = new phpform_html_element("div");
        $this->divControl_group->classAdd("control-group");

        $this->divControls = new phpform_html_element("div");
        $this->divControls->classAdd("controls");
    }

    public function setLabel($labelText) {
        $this->label->set("text", $labelText);
        $this->control->set("placeholder", $labelText);

        return $this;
    }

}

